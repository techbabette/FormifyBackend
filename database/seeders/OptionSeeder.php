<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseOptions = [
            ["form_input_id" => 4, "value" => "Belgrade"],
            ["form_input_id" => 4, "value" => "Novi sad"],
            ["form_input_id" => 4, "value" => "Nis"],
            ["form_input_id" => 5, "value" => "C#"],
            ["form_input_id" => 5, "value" => "PHP"],
            ["form_input_id" => 5, "value" => "React"],
        ];

        foreach($baseOptions as $option){
            Option::insert($option);
        }
    }
}
