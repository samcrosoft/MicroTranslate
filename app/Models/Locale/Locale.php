<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 2:27 PM
 */

namespace App\Models\Locale;


use App\Models\BaseModel;
use App\Custom\Names\TableNames;

class Locale extends BaseModel
{
    /**
     * @const string
     */
    const COLUMN_NAME = "name";
    /**
     * @const string
     */
    const COLUMN_CODE = "code";
    /**
     * @const string
     */
    const COLUMN_DESCRIPTION = "description";

    /**
     * @var string
     */
    public $table = TableNames::LOCALE_TABLE_NAME;

    /**
     * @var array
     */
    public $guarded = [];

}