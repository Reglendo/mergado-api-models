<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\HeurekaCategoryApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IHeurekaCategoryApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;


/**
 * Class MHeurekaCategory
 * @package Reglendo\MergadoApiModels\Models
 */
class MHeurekaCategory extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IHeurekaCategoryApi
     */
    private $api;

    /**
     * MHeurekaCategory constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new HeurekaCategoryApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Gets single category based on $this->id
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->get($this->id);

        $this->populate($fromApi);
        return $this;
    }

    /**
     * Gets list of all categories (with offset and limit to paginate)
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getList($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getList($this->id, $limit, $offset, $fields)->data;

        $stats = MHeurekaCategory::hydrate($this->api->getClient(), $fromApi);
        return $stats;
    }
}