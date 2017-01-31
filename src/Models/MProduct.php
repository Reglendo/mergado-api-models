<?php
namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MProduct
 * @package Reglendo\MergadoApiModels\Models
 */
class MProduct extends MergadoApiModel
{


    /**
     * Get data for this product
     * Elements are in the "data" and "input_data" attributes
     *
     * @method GET
     * @endpoint /api/products/$id/
     * @scope project.products.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        $prepared = $this->api->products($this->id);

        if($fields) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);
        return $this;
    }

    /**
     * Get stats for this product
     *
     * @method GET
     * @endpoint /api/products/$id/stats/
     * @scope project.stats.read
     *
     * @param null $date
     * @return MStats
     */
    public function getStatistics($date = null)
    {
        $prepared = $this->api->products($this->id)->stats;

        if($date) {
            $prepared = $prepared->param("date", $date);
        }

        $fromApi = $prepared->get();

        $stat = new MStats($fromApi, $this->api);
        return $stat;
    }
}