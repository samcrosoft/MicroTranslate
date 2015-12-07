<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/3/2015
 * Time: 2:16 PM
 */

namespace App\Models\Key;


use App\Models\BaseModel;
use App\Models\Messages\Message;
use App\Custom\Names\TableNames;

/**
 * Class Key
 * @package App\Models\Key
 */
class Key extends BaseModel
{

    /**
     * @var string
     */
    public $table = TableNames::KEY_TABLE_NAME;

    /**
     * @var array
     */
    public $guarded = [];

    /**
     * @var array
     */
    public $hidden = [self::CREATED_AT, self::UPDATED_AT];

    /**
     * @const string
     */
    const COLUMN_NAME = "name";
    /**
     * @const string
     */
    const COLUMN_DESCRIPTION = "description";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, Message::COLUMN_KEY_ID);
    }

}