<?php
use App\Models\Key\Key;
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 8:30 AM
 */
class KeyModelFactory
{
    /**
     * @param Generator $oFaker
     * @return array
     */
    function __invoke(Generator $oFaker)
    {
        return [
            Key::COLUMN_NAME => "key." . $oFaker->word,
            Key::COLUMN_DESCRIPTION => "key." . $oFaker->paragraph(),
        ];

    }

}