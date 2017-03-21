<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

/**
 * Interface IVariableApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IVariableApi extends HasApiClient
{

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
    public function get(array $fields = []);

    /**
     * Deletes variable based on $this->id
     *
     * @method DELETE
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @return $this
     */
    public function delete();


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
    public function update($update = []);

}