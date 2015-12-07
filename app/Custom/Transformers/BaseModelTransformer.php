<?php
/**
 * Created by PhpStorm.
 * User: Adebola
 * Date: 12/5/2015
 * Time: 11:28 AM
 */

namespace App\Custom\Transformers;


use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class BaseModelTransformer extends TransformerAbstract
{

    /**
     * @var string
     */
    public $sSelfKey = "self";

    /**
     * @var string
     */
    public $sEditKey = "edit";


    /**
     * @return string
     */
    public function getSelfKey()
    {
        return $this->sSelfKey;
    }

    /**
     * @return string
     */
    public function getEditKey()
    {
        return $this->sEditKey;
    }

    /**
     * @param Model $oModel
     * @return array
     */
    public function transform(Model $oModel)
    {
        $aReturn = $this->resolveModelToArray($oModel);
        return $this->addLinkToResult($oModel, $aReturn);
    }

    /**
     * @param Model $oModel
     * @return array
     */
    protected function resolveModelToArray(Model $oModel)
    {
        return $oModel->toArray();
    }


    /**
     * @param Model $oModel
     * @param array $aResult
     * @return array
     */
    private function addLinkToResult(Model $oModel, $aResult = [])
    {

        $aLinks = $this->buildUpLinks($oModel);
        if (!empty($aLinks) && is_array($aResult)) {
            $aResult['links'] = $aLinks;
        }

        return $aResult;
    }


    /**
     * @param Model $oModel
     * @return array
     */
    protected function buildUpLinks(Model $oModel)
    {
        $aLinks = [];

        /*
         * Add Self Link
         */
        if (!empty($this->getSelfKey())) {
            $aLinks[] = $this->addSelfLink($oModel);
        }


        /*
         * Add Item Link
         */
        if (!empty($this->getEditKey())) {
            $aLinks[] = $this->addEditKey($oModel);
        }


        return $aLinks;
    }

    /**
     * @param Model $oModel
     * @return array
     */
    public function addSelfLink(Model $oModel)
    {
        $aReturn = [
            "rel" => "self",
            "uri" => "/{$this->getSelfKey()}/" . $oModel->getKey()
        ];

        return $aReturn;
    }

    /**
     * @param Model $oModel
     * @return array
     */
    public function addEditKey(Model $oModel)
    {
        $aReturn = [
            "rel" => "edit",
            "uri" => "/{$this->getEditKey()}/" . $oModel->getKey()
        ];

        return $aReturn;
    }
}