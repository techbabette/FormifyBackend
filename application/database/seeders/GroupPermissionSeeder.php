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
          ];
  
          foreach ($baseGroupPermissions as $groupPermission){
            GroupPermission::insert($groupPermission);
          }
    }
}
