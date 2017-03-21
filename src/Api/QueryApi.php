<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IQueryApi;
use Reglendo\MergadoApiModels\Models\MQuery;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class QueryApi
 * @package Reglendo\MergadoApiModels\Api
 */
class QueryApi implements IQueryApi
{
    use ApiAccess;

    /**
     * QueryApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     *
     * @method GET
     * @endpoint /api/queries/$id/
     * @scope projects.queries.read
     *
     * @param array $fields
     * @return MQuery
     */
    public function get(array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param array $query
     * @return MQuery
     */
    public function update($query = [])
    {
        // TODO: Implement update() method.
    }

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @return MQuery
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * Getproducts from query
     *
     * @method GET
     * @endpoint /api/queries/$id/products/
     * @scope projects.products.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return MQuery
     */
    public function getProducts($limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getProducts() method.
    }
}