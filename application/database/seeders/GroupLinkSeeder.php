<?php

namespace Database\Seeders;

use App\Models\GroupLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseGroupLinks = [
            ["group_id" => 1, "link_id" => 1],
            ["group_id" => 1, "link_id" => 2],
            ["group_id" => 1, "link_id" => 3],
            ["group_id" => 1, "link_id" => 4],
            ["group_id" => 1, "link_id" => 5],

            ["group_id" => 2, "link_id" => 1],
            ["group_id" => 2, "link_id" => 2],
            ["group_id" => 2, "link_id" => 3],
            ["group_id" => 2, "link_id" => 4],
            ["group_id" => 2, "link_id" => 5],

            ["group_id" => 3, "link_id" => 1],
            ["group_id" => 3, "link_id" => 2],
            ["group_id" => 3, "link_id" => 3],
            ["group_id" => 3, "link_id" => 4],
            ["group_id" => 3, "link_id" => 5],
          ];
  
          foreach ($baseGroupLinks as $group){
            GroupLink::insert($group);
          }
    }
}
