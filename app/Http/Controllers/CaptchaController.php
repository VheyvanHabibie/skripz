<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> Captcha::img()]);
    }
}
