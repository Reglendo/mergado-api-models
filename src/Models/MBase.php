<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;


/**
 * Class MBase
 * base section of Mergado API
 * @package Reglendo\MergadoApiModels\Models
 */
class MBase extends MergadoApiModel
{

    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
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
        $data = $this->api->get();

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
        $data = $this->api->formats->get();

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
        $data = $this->api->rules->definitions->get();

        return $data;
    }
}