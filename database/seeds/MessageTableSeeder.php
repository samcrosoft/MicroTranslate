<?php
use App\Models\Key\Key;
use App\Models\Locale\Locale;
use App\Models\Messages\Message;

/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/5/2015
 * Time: 5:27 PM
 */
class MessageTableSeeder extends BaseSeeder
{

    public function run()
    {
        self::disableForeignKeyGuard();
        $this->performSeeding();
        self::enableForeignKeyGuard();
    }

    /**
     *
     */
    public function performSeeding()
    {
        /*
           * Truncate the Message Seeder
           */
        Message::truncate();


        $aKeys = Key::all()->lists(Key::getTablePrimaryKeyName());
        $aLocales = Locale::all()->lists(Locale::getTablePrimaryKeyName())->toArray();
//        dd($aLocales);

        collect($aKeys)->each(function ($iKey) use ($aLocales) {
            foreach ($aLocales as $iLocaleID) {

                $oMessage = factory(Message::class)->make();
                $oMessage->setAttribute(Message::COLUMN_LOCALE_ID, $iLocaleID);
                $oMessage->setAttribute(Message::COLUMN_KEY_ID, $iKey);
                $aMessage = $oMessage->toArray();
                // create the message
                Message::create($aMessage);
            }
        });
    }

}