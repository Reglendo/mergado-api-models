<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

/**
 * Interface IElementApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IElementApi extends HasApiClient
{

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
    public function get($id, array $fields = []);

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
    public function delete($id);


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
    public function update($id, $update = []);

}