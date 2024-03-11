<?php

namespace Database\Seeders;

use App\Models\Input;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseInputs = [
          ["text" => "Text", "type" => "text"],
          ["text" => "Select", "type" => "select"],
          ["text" => "Select multiple", 'type' => 'select_multiple']
        ];

        foreach ($baseInputs as $input){
            Input::insert($input);
        }
    }
}
