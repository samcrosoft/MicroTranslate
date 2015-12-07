<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/5/2015
 * Time: 5:36 PM
 */

namespace App\Custom\Transformers\Message;


use App\Custom\Transformers\BaseModelTransformer;
use App\Models\Key\Key;
use App\Models\Locale\Locale;
use App\Models\Messages\Message;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageTransformer
 * @package App\Custom\Transformers\Message
 */
class MessageTransformer extends BaseModelTransformer
{
    /**
     * @param Model $oModel
     * @return array
     */
    protected function resolveModelToArray(Model $oModel)
    {
        /** @var Key $oKey */
        $oKey = $oModel->getAttribute("key");
        /** @var Locale $oLocale */
        $oLocale = $oModel->getAttribute("locale");
        $aReturn = [
            $oModel->getKeyName() => $oModel->getKey(),
            "key" => $oKey ? $oKey->getAttribute(Key::COLUMN_NAME) : null,
            "locale" => $oLocale ? $oLocale->getAttribute(Locale::COLUMN_CODE) : null,
            Message::COLUMN_TEXT => $oModel->getAttribute(Message::COLUMN_TEXT),
        ];
        return $aReturn;
    }


}