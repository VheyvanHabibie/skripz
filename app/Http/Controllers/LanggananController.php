<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanggananController extends Controller
{
    public function index()
    {
        return view('pages.langganan.index');
    }
    public function payPremium(Request $request)
    {
        $user = auth()->user();

        // Detail transaksi
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => 100000, // Nominal untuk upgrade ke akun pro (misal Rp100,000)
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('pages.langganan.premium', compact('snapToken'));
        } catch (\Exception $e) {
            return back()->withErrors('Gagal membuat pembayaran.');
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $user = User::where('order_id', $request->order_id)->first();

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Set status ke 'pro' dan durasi premium (contoh: 30 hari)
                $user->account_status = 'pro';
                $user->account_expires_at = now()->addDays(365);
                $user->save();
            } elseif ($request->transaction_status == 'expire') {
                $user->account_status = 'biasa';
                $user->save();
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
