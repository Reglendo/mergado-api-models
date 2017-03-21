<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;


/**
 * Interface IHeurekaCategoryApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IHeurekaCategoryApi extends HasApiClient
{

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
    public function get($id);

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
    public function getList($id, $limit = 10, $offset = 0, array $fields = []);

}