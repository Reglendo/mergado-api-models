<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

use Reglendo\MergadoApiModels\Models\MTask;

/**
 * Interface ITaskApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface ITaskApi extends HasApiClient
{

    /**
     * Gets single task based on $id
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @param $id
     * @return MTask
     */
    public function get($id);
}