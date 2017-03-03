<?php

namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IBaseApi;

class BaseApi implements IBaseApi
{

    /**
     * Gets version
     *
     * @method GET
     * @endpoint /
     * @scope null
     *
     * @param ApiClient $apiClient
     * @return string
     */
    public static function getVersion(ApiClient $apiClient)
    {
        // TODO: Implement getVersion() method.
    }

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @return mixed
     */
    public static function getSupportedFormats(ApiClient $apiClient)
    {
        // TODO: Implement getSupportedFormats() method.
    }

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @return mixed
     */
    public static function getRuleDefinitions(ApiClient $apiClient)
    {
        // TODO: Implement getRuleDefinitions() method.
    }
}