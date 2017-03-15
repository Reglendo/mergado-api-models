<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;

use MergadoClient\ApiClient;

interface IBaseApi
{

    public function __construct();

    /**
     * Gets version
     *
     * @method GET
     * @endpoint /
     * @scope null
     *
     * @return string
     */
    public static function getVersion();

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @return mixed
     */
    public static function getSupportedFormats();

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @return mixed
     */
    public static function getRuleDefinitions();

}