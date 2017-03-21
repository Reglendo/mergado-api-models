<?php
namespace Reglendo\MergadoApiModels\ApiMocks;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IBaseApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class BaseApiMock
 * @package Reglendo\MergadoApiModels\ApiMocks
 */
class BaseApiMock implements IBaseApi
{
    use ApiAccess;

    /**
     * BaseApiMock constructor.
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
     * @return object
     */
    public function getVersion()
    {
        $result = new \stdClass();
        $result->version = "0.2";

        return $result;
    }

    /**
     * Gets an array of supported formats
     * @method GET
     * @endpoint /formats/
     * @scope null
     *
     * @return mixed
     */
    public function getSupportedFormats()
    {
        $result = [
            "heureka.cz",
            "hledejceny.cz",
            "hyperzbozi.cz",
            "srovname.cz",
            "zbozi.cz",
            "heureka.cz-kosik",
            "heureka.sk",
            "najnakup.sk",
            "pricemania.sk"
        ];

        return $result;
    }

    /**
     * @method GET
     * @endpoint /rules/definitions/
     * @scope null
     *
     * @return mixed
     */
    public function getRuleDefinitions()
    {
        $result = json_decode('{
          "data": [
            {
              "type": "format_converter",
              "relationship": "1:1",
              "fields": []
            },
            {
              "type": "rewriting",
              "relationship": "1:1",
              "fields": [
                {
                  "name": "new_content",
                  "required": true,
                  "type": "STRING"
                }
              ]
            },
            {
              "type": "replacing",
              "relationship": "1:1",
              "fields": [
                {
                  "name": "search",
                  "required": true,
                  "type": "STRING"
                },
                {
                  "name": "replacement",
                  "required": true,
                  "type": "STRING"
                },
                {
                  "name": "regex",
                  "required": true,
                  "type": "BOOLEAN"
                },
                {
                  "name": "case_sensitive",
                  "required": true,
                  "type": "BOOLEAN"
                }
              ]
            }
          ],
          "limit": 10,
          "offset": 0
        }');

        return $result;
    }
}