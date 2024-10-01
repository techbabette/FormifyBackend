<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseLinks = [
            ["text" => "Login", "position" => "main_navbar", "to" => "/login", "weight" => 80],
            ["text" => "Home", "position" => "main_navbar", "to" => "/", "weight" => 100],
            ["text" => "Register", "position" => "main_navbar", "to" => "/register", "weight" => 70],
            ["text" => "Create new form", "position" => "main_navbar", "to" => "/form/new", "weight" => 90],
            ["text" => "Make your own form here!", "position" => "visiting_form_navbar", "to" => "/form/new", "weight" => 100],
            ["text" => "My forms", "position" => "main_navbar", "to" => "/forms/me", "weight" => 95],
          ];

          foreach ($baseLinks as $input){
              Link::insert($input);
          }
    }
}
