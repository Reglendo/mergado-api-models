<?php

namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MTask
 * @package Reglendo\MergadoApiModels\Models
 */
class MTask extends MergadoApiModel
{

    /**
     * Gets single task based on $this->id
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->tasks($this->id)->get();
        $this->populate($fromApi);
        return $this;
    }
}