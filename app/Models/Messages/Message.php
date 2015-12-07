<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 9:11 AM
 */

namespace App\Models\Messages;


use App\Models\BaseModel;
use App\Custom\Names\TableNames;
use App\Models\Key\Key;
use App\Models\Locale\Locale;

/**
 * Class Message
 * @package App\Models\Messages
 */
class Message extends BaseModel
{
    /**
     * @const string
     */
    const COLUMN_KEY_ID = "key_id";

    /**
     * @const string
     */
    const COLUMN_LOCALE_ID = "locale_id";
    /**
     * @const string
     */
    const COLUMN_LOCALE_CODE = "code";

    /**
     * @const string
     */
    const COLUMN_TEXT = "text";

    /**
     * @var string
     */
    public $table = TableNames::MESSAGES_TABLE_NAME;

    /**
     * @var array
     */
    public $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function key()
    {
        return $this->belongsTo(Key::class,self::COLUMN_KEY_ID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locale()
    {
        return $this->belongsTo(Locale::class,self::COLUMN_LOCALE_ID);
    }
}