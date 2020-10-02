<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(1)->create([
            "name" => "tincoh",
            "email" => "zaccomartin@gmail.com",
            "password" => bcrypt("password")
        ]);
            Project::factory()->times(40)->create();
    }
}
