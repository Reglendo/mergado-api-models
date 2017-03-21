<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IEshopApi;
use Reglendo\MergadoApiModels\Models\MEshop;
use Reglendo\MergadoApiModels\Models\MNotification;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class EshopApi
 * @package Reglendo\MergadoApiModels\Api
 */
class EshopApi implements IEshopApi
{
    use ApiAccess;

    /**
     * EshopApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Get eshop
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?fields=$fields
     * @scope shop.read
     *
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->shops($id)
            ->fields($fields)->get();
    }

    /**
     * Catches shops info and populates it into this instance
     * Future: Mergado might add "fields" param
     *
     * @method GET
     * @endpoint /api/shops/$id/info/
     * @scope shop.read
     *
     * @param $id
     * @return object
     */
    public function getInfo($id)
    {
        return $this->apiClient->shops($id)->info
            ->get();
    }

    /**
     * Gets projects of eshop
     * returns Collection of MProject instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?limit=$limit&offset=$offset&fields=$fields
     * @scope shop.projects.read
     *
     * @param $id
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @return object
     */
    public function getProjects($id, array $fields = [], $limit = 10, $offset = 0)
    {
        return $this->apiClient->shops($id)->projects
            ->limit($limit)->offset($offset)
            ->fields($fields)
            ->get();
    }

    /**
     * Gets eshop google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.gs.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return object
     */
    public function getGoogleAnalytics($id, $limit = 10, $offset = 0,
                                       array $fields = [], $dimensions = [], $metrics = [],
                                       $startDate = null, $endDate = null)
    {
        $prepared = $this->apiClient->shops($id)->google->analytics
            ->limit($limit)->offset($offset)->fields($fields);

        if ($startDate) {
            $prepared = $prepared->param("start_date", $startDate);
        }

        if ($endDate) {
            $prepared = $prepared->param("end_date", $endDate);
        }

        if ($dimensions) {
            $dimensions = implode(',', $dimensions);
            $prepared = $prepared->param("dimensions", $dimensions);
        }

        if ($metrics) {
            $metrics = implode(',', $metrics);
            $prepared = $prepared->param("metrics", $metrics);
        }
        return $prepared->get();
    }

    /**
     * Sends notification to eshop members
     *
     * @method POST
     * @endpoint /api/shops/$id/notifications/
     * @scope shop.notify.write
     *
     * @param $id
     * @param $notification
     * @return object
     */
    public function sendNotification($id, $notification)
    {
        return $this->apiClient->shops($id)->notifications->post($notification);
    }

    /**
     * Get eshop statistics
     *
     * @method GET
     * @endpoint /api/shops/$id/stats/
     * @scope project.stats.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getStatistics($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->shops($id)->stats
            ->limit($limit)->offset($offset)
            ->fields($fields)
            ->get();
    }
}