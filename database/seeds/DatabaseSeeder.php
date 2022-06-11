<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IconSeeder::class);
        $this->call(MenuDetailSeeder::class);
        $this->call(MenuMasterSeeder::class);
        $this->call(RoleSeeders::class);
        $this->call(UserSeeders::class);
    }
}
