<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/4/2015
 * Time: 12:10 PM
 */

namespace App\Http\Controllers\Message;


use App\Custom\Transformers\Message\MessageTransformer;
use App\Http\Controllers\Controller;
use App\Models\Messages\Message;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

/**
 * Class MessageController
 * @package App\Http\Controllers\Message
 */
class MessageController extends Controller
{

    /**
     * @return array
     */
    public function getIndex()
    {
        $aKeys = Message::with(['key'])->get();
        $resource = new Collection($aKeys, new MessageTransformer(), "message");

        $manager = new Manager();
//        $manager->setSerializer(new DataArraySerializer());
        $manager->setSerializer(new JsonApiSerializer());
        // Run all transformers
        $aReturn = $manager->createData($resource)->toArray();

        return $aReturn;
    }
}