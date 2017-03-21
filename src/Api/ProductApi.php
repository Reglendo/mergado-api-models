<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IProductApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class ProductApi
 * @package Reglendo\MergadoApiModels\Api
 */
class ProductApi implements IProductApi
{
    use ApiAccess;

    /**
     * ProductApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Get data for this product
     * Elements are in the "data" and "input_data" attributes
     *
     * @method GET
     * @endpoint /api/products/$id/
     * @scope project.products.read
     *
     * @param $id
     * @param array $fields
     * @return object
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->products($id)
            ->fields($fields)->get();
    }

    /**
     * Get stats for this product
     *
     * @method GET
     * @endpoint /api/products/$id/stats/
     * @scope project.stats.read
     *
     * @param $id
     * @param null $date
     * @return object
     */
    public function getStatistics($id, $date = null)
    {
        $prepared = $this->apiClient->products($id)->stats;

        if($date) {
            $prepared = $prepared->param("date", $date);
        }

        return $prepared->get();
    }
}