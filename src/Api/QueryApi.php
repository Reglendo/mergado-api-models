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
     * @param $id
     * @param array $fields
     * @return MQuery
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->queries($id)
            ->fields($fields)->get();
    }

    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param $id
     * @param array $query
     * @return MQuery
     */
    public function update($id, $query = [])
    {
        return $this->apiClient->queries($id)
            ->patch($query);
    }

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param $id
     * @return MQuery
     */
    public function delete($id)
    {
        return $this->apiClient->queries($id)
            ->delete();
    }

    /**
     * Getproducts from query
     *
     * @method GET
     * @endpoint /api/queries/$id/products/
     * @scope projects.products.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return MQuery
     */
    public function getProducts($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->queries($id)->products
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }
}