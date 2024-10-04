<?php

namespace Database\Seeders;

use App\Models\RegexOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegexOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseRegexOptions = [
            ["text" => "Email", "value" => "/^([a-z0-9_\.\+-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/"],
            ["text" => "Date YYYY-MM-dd", "value" => "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/"],
            ["text" => "URL", "value" => "/(https?:\/\/)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/"],
        ];

        foreach($baseRegexOptions as $baseRegex){
            RegexOption::insert($baseRegex);
        }
    }
}
