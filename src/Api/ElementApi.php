<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IElementApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class ElementApi
 * @package Reglendo\MergadoApiModels\Api
 */
class ElementApi implements IElementApi
{
    use ApiAccess;

    /**
     * ElementApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets element based on $this->id
     *
     * @method GET
     * @endpoint /api/elements/$id/
     * @scope project.elements.read
     *
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public function get($id, array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Deletes element based on $this->id
     *
     * @method DELETE
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @param $id
     * @return $this
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Updates this element
     *
     * @method PATCH
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @param $id
     * @param array $update
     * @return $this
     */
    public function update($id, $update = [])
    {
        // TODO: Implement update() method.
    }
}