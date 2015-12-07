<?php
use Faker\Generator;

/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 12:15 PM
 */
class MessageModelFactory
{
    public function __invoke(Generator $oFaker)
    {
        return [
            \App\Models\Messages\Message::COLUMN_TEXT => $oFaker->text(200),
        ];
    }
}