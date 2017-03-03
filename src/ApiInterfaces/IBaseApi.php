<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;

use MergadoClient\ApiClient;

interface IBaseApi
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
    public static function getVersion(ApiClient $apiClient);

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @return mixed
     */
    public static function getSupportedFormats(ApiClient $apiClient);

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @return mixed
     */
    public static function getRuleDefinitions(ApiClient $apiClient);

}