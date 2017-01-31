<?php

namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MBase
 * base section of Mergado API
 * @package Reglendo\MergadoApiModels\Models
 */
class MBase extends MergadoApiModel
{

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