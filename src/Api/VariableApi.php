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
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Deletes variable based on $this->id
     *
     * @method DELETE
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @return $this
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * Updates this variables
     *
     * @method PATCH
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @param $update
     * @return $this
     */
    public function update($update = [])
    {
        // TODO: Implement update() method.
    }
}