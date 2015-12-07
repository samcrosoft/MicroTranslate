<?php
use App\Models\Locale\Locale;

/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 3:00 PM
 */
class LocaleTableSeeder extends BaseSeeder
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


    /**
     * @return array
     */
    public function getSeedingData()
    {
        $aReturn = [
            [
                Locale::COLUMN_NAME => 'English (GB)',
                Locale::COLUMN_CODE => 'en_GB',
                Locale::COLUMN_DESCRIPTION => 'English Great Britain',
            ],
            [
                Locale::COLUMN_NAME => 'German (Germany)',
                Locale::COLUMN_CODE => 'de_DE',
                Locale::COLUMN_DESCRIPTION => 'German Locale',
            ],

        ];

        return $aReturn;
    }

    public function performSeeding()
    {
        Locale::truncate();

        foreach ($this->getSeedingData() as $aData) {
            Locale::create($aData);
        }
//        Locale::insert($this->getSeedingData());

    }
}