<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\QueryApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IQueryApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;


/**
 * Class MQuery
 * @package Reglendo\MergadoApiModels\Models
 */
class MQuery extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IQueryApi
     */
    private $api;

    /**
     * MQuery constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new QueryApi();
        $this->api->setClient($apiClient);
    }

    /**
     *
     * @method GET
     * @endpoint /api/queries/$id/
     * @scope projects.queries.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields =[]) {
        $fromApi = $this->api->get($this->id, $fields);

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param array $query
     * @return $this
     */
    public function update($query = []) {
        $this->populate($query);

        $fromApi = $this->api->update($this->id, $this->stripNullProperties());
        $this->populate($fromApi);

        return $this;
    }

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @return $this
     */
    public function delete() {
        $this->api->delete($this->id);

        $this->exists = false;

        return $this;
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
     * @return $this
     */
    public function getProducts($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getProducts($this->id, $limit, $offset, $fields)->data;

        $products = MProduct::hydrate($this->api->getClient(), $fromApi);

        return $products;
    }

}