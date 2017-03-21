<?php
namespace Reglendo\MergadoApiModels\Models;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\VariableApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IVariableApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MVariable
 * @package Reglendo\MergadoApiModels\Models
 */
class MVariable extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IVariableApi
     */
    private $api;

    /**
     * MVariable constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new VariableApi();
        $this->api->setClient($apiClient);
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
        $fromApi = $this->api->get($this->id, $fields);

        $this->populate($fromApi);

        return $this;
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
        $this->api->delete($this->id);

        $this->exists = false;

        return $this;
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
        // pupulates with the update
        $this->populate($update);

        $fromApi = $this->api->update($this->id, $this->stripNullProperties());
        // populates with the response from API
        $this->populate($fromApi);

        return $this;
    }


}