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
        // $this->call(UsersTableSeeder::class);

        // $path = database_path('factories/factories.sql');
        $path = database_path('factories/remote_factories.sql');
        \DB::unprepared(file_get_contents($path));
    }
}
