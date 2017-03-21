<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IHeurekaCategoryApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

class HeurekaCategoryApi implements IHeurekaCategoryApi
{
    use ApiAccess;

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
        // TODO: Implement get() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getList($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getList() method.
    }
}