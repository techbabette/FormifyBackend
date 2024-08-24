<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            GroupPermissionSeeder::class,
            UserSeeder::class,
            InputSeeder::class,
            FormSeeder::class,
            FormInputsSeeder::class,
            OptionSeeder::class,
            RegexOptionSeeder::class,
            LinkSeeder::class,
            GroupLinkSeeder::class
        ]);
    }
}
