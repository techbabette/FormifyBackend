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
          ["text" => "Number", "type" => "number"],
          ["text" => "Select", "type" => "select"],
          ["text" => "Select without hint", "type" => "select_without_hint"],
          ["text" => "Select multiple", 'type' => 'select_multiple']
        ];

        foreach ($baseInputs as $input){
            Input::insert($input);
        }
    }
}
