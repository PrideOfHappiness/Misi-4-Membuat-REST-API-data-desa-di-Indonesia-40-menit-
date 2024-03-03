<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinces;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fileCSV = __DIR__ . '/provinces1.csv';
        $dataCSV = file_get_contents($fileCSV);
        $rows = array_map('str_getcsv', explode("\n", $dataCSV));
        $headers = array_shift($rows);
        foreach($rows as $row) {
            $row = str_replace(',', '.', $row);
            $rowData = array_combine($headers, $row);
            Provinces::insert($rowData);
        }
    }
}
