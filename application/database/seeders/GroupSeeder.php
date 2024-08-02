<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseGroups = [
            ["name" => "User", "is_default_registered" => true],
            ["name" => "Admin", "is_default_registered" => false],
          ];
  
          foreach ($baseGroups as $group){
            Group::insert($group);
          }
    }
}
