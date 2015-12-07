<?php
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 8:11 AM
 */
class BaseSeeder extends Seeder
{

    /**
     * This method will disable the foreign key limit/guard
     */
    public static function disableForeignKeyGuard()
    {
        \DB::statement("SET foreign_key_checks = 0");
    }

    /**
     * This method will enable the foreign key limit/guard
     */
    public static function enableForeignKeyGuard()
    {
        \DB::statement("SET foreign_key_checks = 1");
    }

}