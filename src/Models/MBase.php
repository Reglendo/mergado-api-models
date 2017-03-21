<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\BaseApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IBaseApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;


/**
 * Class MBase
 * base section of Mergado API
 * @package Reglendo\MergadoApiModels\Models
 */
class MBase extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IBaseApi
     */
    private $api;

    /**
     * MBase constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes);

        $this->api = new BaseApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Gets version
     *
     * @method GET
     * @endpoint /
     * @scope null
     *
     * @return string
     */
    public function getVersion()
    {
        $data = $this->api->getVersion();

        return $data->version;
    }

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     * @return mixed
     */
    public function getSupportedFormats()
    {
        $data = $this->api->getSupportedFormats();

        return $data;
    }

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     * @return mixed
     */
    public function getRuleDefinitions()
    {
        $data = $this->api->getRuleDefinitions();

        return $data;
    }
}