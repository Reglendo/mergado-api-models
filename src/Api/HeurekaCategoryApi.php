<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IHeurekaCategoryApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class HeurekaCategoryApi
 * @package Reglendo\MergadoApiModels\Api
 */
class HeurekaCategoryApi implements IHeurekaCategoryApi
{
    use ApiAccess;

    /**
     * HeurekaCategoryApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets single category based on $this->id
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param $id
     * @return $this
     */
    public function get($id)
    {
        return $this->apiClient->heureka->categories($id)
            ->get();
    }

    /**
     * Gets list of all categories (with offset and limit to paginate)
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getList($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->heureka->categories
            ->limit($limit)->offset($offset)
            ->fields($fields)
            ->get();
    }
}