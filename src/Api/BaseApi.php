<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IBaseApi;

class BaseApi implements IBaseApi
{

    /**
     * @param ApiClient $apiClient
     * @return mixed
     */
    public function setClient(ApiClient $apiClient)
    {
        // TODO: Implement setClient() method.
    }

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token)
    {
        // TODO: Implement setToken() method.
    }

    public function __construct()
    {
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
    public static function getVersion()
    {
        // TODO: Implement getVersion() method.
    }

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @return mixed
     */
    public static function getSupportedFormats()
    {
        // TODO: Implement getSupportedFormats() method.
    }

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @return mixed
     */
    public static function getRuleDefinitions()
    {
        // TODO: Implement getRuleDefinitions() method.
    }
}