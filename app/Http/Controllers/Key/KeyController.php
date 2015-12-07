<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/3/2015
 * Time: 9:54 AM
 */

namespace App\Http\Controllers\Key;


use App\Custom\Transformers\Key\KeyTransformer;
use App\Http\Controllers\Controller;
use App\Models\Key\Key;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\JsonApiSerializer;

/**
 * Class KeyController
 * @package App\Http\Controllers\Key
 */
class KeyController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        $aKeys = Key::all();
        $resource = new Collection($aKeys, new KeyTransformer, "keys");
        $manager = new Manager();
//        $manager->setSerializer(new DataArraySerializer());
        $manager->setSerializer(new JsonApiSerializer());
        // Run all transformers
        $aReturn = $manager->createData($resource)->toArray();


        return $aReturn;
    }
}