<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\ProductApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IProductApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;


/**
 * Class MProduct
 * @package Reglendo\MergadoApiModels\Models
 */
class MProduct extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IProductApi
     */
    private $api;

    /**
     * MProduct constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new ProductApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Get data for this product
     * Elements are in the "data" and "input_data" attributes
     *
     * @method GET
     * @endpoint /api/products/$id/
     * @scope project.products.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        $fromApi = $this->api->get($this->id, $fields);

        $this->populate($fromApi);
        return $this;
    }

    /**
     * Get stats for this product
     *
     * @method GET
     * @endpoint /api/products/$id/stats/
     * @scope project.stats.read
     *
     * @param null $date
     * @return MStats
     */
    public function getStatistics($date = null)
    {
        $fromApi = $this->api->getStatistics($this->id, $date);

        $stat = new MStats($fromApi, $this->api->getClient());
        return $stat;
    }
}