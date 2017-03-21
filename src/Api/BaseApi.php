<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IBaseApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class BaseApi
 * @package Reglendo\MergadoApiModels\Api
 */
class BaseApi implements IBaseApi
{
    use ApiAccess;

    /**
     * BaseApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
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