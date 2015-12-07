<?php

use App\Models\Key\Key;
use App\Models\Messages\Message;

/**
 * Class KeyTableSeeder
 */
class KeyTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // disable foreign key
        self::disableForeignKeyGuard();

        // perform the seeding
        $this->performSeeding();

        // enable the foreign key
        self::enableForeignKeyGuard();
    }


    public function performSeeding()
    {
        Key::truncate();
        /*
         * Truncate the Message Seeder
         */
        Message::truncate();

        /*
         * Create the locale
         */
        factory(Key::class, 5)->create();
    }
}
