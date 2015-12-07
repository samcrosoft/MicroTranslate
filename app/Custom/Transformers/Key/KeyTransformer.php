<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/5/2015
 * Time: 11:53 AM
 */

namespace App\Custom\Transformers\Key;


use App\Custom\Transformers\BaseModelTransformer;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KeyTransformer
 * @package App\Custom\Transformers\Key
 */
class KeyTransformer extends BaseModelTransformer
{

    /**
     * @var null
     */
    public $sEditKey = null;

    /**
     * @param Model $oModel
     * @return array
     */
    public function transform(Model $oModel)
    {

        return parent::transform($oModel);
    }


}