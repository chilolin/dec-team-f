<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Matter;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Skill::factory(1)->create();
        // Client::factory(10)->create();
        Matter::factory(48)->create();

        $this->call([
            // SkillSeeder::class,
            CareerSeeder::class,
            MatterSkillSeeder::class,
            SkillUserSeeder::class,
            MatterUserSeeder::class
        ]);
    }
}
