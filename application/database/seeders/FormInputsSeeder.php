<?php

namespace Database\Seeders;

use App\Models\FormInput;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormInputsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseFormInputs = [
        [
            'form_id' => 1,
            'input_id' => 1,
            'label' => "First name",
            'required' => true,
            'width' => 6,
            'weight' => 100,
        ],
        [
            'form_id' => 1,
            'input_id' => 1,
            'label' => "Email",
            'required' => true,
            'width' => 12,
            'weight' => 90,
        ],
        [
            'form_id' => 1,
            'input_id' => 1,
            'label' => "Last name",
            'required' => true,
            'width' => 6,
            'weight' => 95,
        ],
        [
            'form_id' => 1,
            'input_id' => 3,
            'label' => "City",
            'required' => true,
            'width' => 12,
            'weight' => 85,
        ],
        [
            'form_id' => 1,
            'input_id' => 5,
            'label' => "Classes",
            'required' => true,
            'width' => 12,
            'weight' => 80,
        ],
    ];

        foreach($baseFormInputs as $formInput){
            FormInput::insert($formInput);
        }
    }
}
