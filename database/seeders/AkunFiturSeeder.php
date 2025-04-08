<?php

namespace Database\Seeders;

use App\Models\Fitur;
use App\Models\FiturAkun;
use App\Models\AkunStatus;
use Illuminate\Database\Seeder;

class AkunFiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic = AkunStatus::updateOrCreate(['name' => 'Basic'], ['name' => 'Basic']);
        $pro = AkunStatus::updateOrCreate(['name' => 'Pro'], ['name' => 'Pro']);

        // Hubungkan fitur dengan paket
        $basicFeatures = [
            'submission_proposal' => 2,
            'progress_report' => 3,
            'notification_seminar' => null,
            'thesis_tracking' => null,
            'unlimited_upload' => null,
            'collaboration' => null,
            'thesis_topics' => 10,
            'task_notifications' => null,
            'storage_limit' => 500
        ];

        foreach ($basicFeatures as $key => $limit) {
            $feature = Fitur::where('key', $key)->first();
            if ($feature) {
                FiturAkun::updateOrCreate(
                    ['akun_id' => $basic->id, 'fitur_id' => $feature->id],
                    ['limit' => $limit]
                );
            }
        }

        $proFeatures = [
            'submission_proposal' => 10,
            'progress_report' => 8,
            'notification_seminar' => null,
            'thesis_tracking' => null,
            'unlimited_upload' => null,
            'collaboration' => null,
            'task_notifications' => null,
            'progress_analysis' => null,
            'sync_with_university' => null,
            'automatic_backup' => null,
            'export_reports' => null,
            'reference_search' => null,
            'priority_revision' => null,
            'thesis_topics' => 15,
            'storage_limit' => 2048,
        ];

        foreach ($proFeatures as $key => $limit) {
            $feature = Fitur::where('key', $key)->first();
            if ($feature) {
                $pro->features()->syncWithoutDetaching([$feature->id => ['limit' => $limit]]);
            }
        }
    }
}
