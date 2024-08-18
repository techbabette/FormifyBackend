<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseForms = [
          ["name" => "First form", "user_id" => "1", "resetButtonAvailable" => true]
        ];

        foreach ($baseForms as $form){
            Form::insert($form);
        }
    }
}
