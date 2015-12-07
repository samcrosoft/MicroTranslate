<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 4:20 PM
 */

namespace App\Http\Controllers\Locale;


use App\Custom\Transformers\Locale\LocaleTransformer;
use App\Http\Controllers\Controller;
use App\Models\Locale\Locale;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

/**
 * Class LocaleController
 * @package App\Http\Controllers\Locale
 */
class LocaleController extends Controller
{


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        $aKeys = Locale::all();
        $resource = new Collection($aKeys, new LocaleTransformer(), "locale");

        $manager = new Manager();
//        $manager->setSerializer(new DataArraySerializer());
        $manager->setSerializer(new JsonApiSerializer());
        // Run all transformers
        $aReturn = $manager->createData($resource)->toArray();

        return $aReturn;
    }
}