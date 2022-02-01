<?php

namespace Database\Seeders;

use App\Models\Jobs;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jobs::truncate();

            $report = fopen(base_path("database/data/data.csv"), "r");

            $dataRow = true;
            while (($data = fgetcsv($report, 4000, ",")) !== FALSE) {
                if (!$dataRow) {
                    Jobs::create([
                        "name" => $data['0'],
                        "job" => $data['1'],
                        "salary" => $data['2'],
                    ]);
                }
                $dataRow = false;
            }

        fclose($report);
    }
}
