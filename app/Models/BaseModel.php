<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/3/2015
 * Time: 2:21 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App\Models
 */
abstract class BaseModel extends Model
{

    /**
     * @var array
     */
    public $hidden = [self::CREATED_AT, self::UPDATED_AT];

    /**
     * This will return the table name
     * @return string
     */
    public static function getTableName()
    {
        return (new static)->getTable();
    }

    /**
     * This will indicate if timestamps are allowed for
     * @return bool
     */
    public static function IsTimeStampAllowed()
    {
        return (new static)->usesTimestamps();
    }


    /**
     * @return string
     */
    public static function getTablePrimaryKeyName()
    {
        return (new static)->primaryKey;
    }

    /**
     * This will truncate the table
     */
    public static function truncate()
    {
        \DB::table(self::getTableName())->truncate();
    }

}