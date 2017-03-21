<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IVariableApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class VariableApi
 * @package Reglendo\MergadoApiModels\Api
 */
class VariableApi implements IVariableApi
{
    use ApiAccess;

    /**
     * VariableApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets variable based on $this->id
     *
     * @method GET
     * @endpoint /api/variables/$id/
     * @scope project.variables.read
     *
     * @param $id
     * @param array $fields
     * @return $this
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->variables($id)
            ->fields($fields)->get();
    }

    /**
     * Deletes variable based on $this->id
     *
     * @method DELETE
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @param $id
     * @return $this
     */
    public function delete($id)
    {
        return $this->apiClient->variables($id)
            ->delete();
    }

    /**
     * Updates this variables
     *
     * @method PATCH
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @param $id
     * @param array $update
     * @return $this
     */
    public function update($id, $update = [])
    {
        return $this->apiClient->variables($id)
            ->patch($update);
    }
}