<?php

namespace Database\Seeders;

use App\Models\GroupPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseGroupPermissions = [
            ["permission" => "UserLogoutRequest", "group_id" => 2],
            ["permission" => "UserLogoutRequest", "group_id" => 3],

            ["permission" => "FormListResponses", "group_id" => 2],
            ["permission" => "FormListResponses", "group_id" => 2],

            ["permission" => "FormListPersonal", "group_id" => 2],
            ["permission" => "FormListPersonal", "group_id" => 3],

            ["permission" => "FormCreate", "group_id" => 2],
            ["permission" => "FormCreate", "group_id" => 3],
          ];

          foreach ($baseGroupPermissions as $groupPermission){
            GroupPermission::insert($groupPermission);
          }
    }
}
