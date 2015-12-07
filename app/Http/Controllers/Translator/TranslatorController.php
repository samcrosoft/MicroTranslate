<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/3/2015
 * Time: 9:47 AM
 */

namespace App\Http\Controllers\Translator;


use App\Http\Controllers\Controller;

/**
 * Class TranslatorController
 * @package App\Http\Controllers\Translator
 */
class TranslatorController extends Controller
{

    public function getIndex()
    {
        return range(1,10);
    }
}