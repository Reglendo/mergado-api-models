<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

interface IBaseApi extends HasApiClient
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
    public function getVersion();

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @return mixed
     */
    public function getSupportedFormats();

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @return mixed
     */
    public function getRuleDefinitions();

}