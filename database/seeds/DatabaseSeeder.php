<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /**
         * Table Seeders
         */
        $this->call(LocaleTableSeeder::class);
        $this->call(KeyTableSeeder::class);
        $this->call(MessageTableSeeder::class);

        Model::reguard();
    }
}
