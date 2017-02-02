<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;

/**
 * Class MEshop
 * @package Reglendo\MergadoApiModels\Models
 */
class MEshop extends MergadoApiModel
{

    /**
     * MEshop constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

    /**
     * Get eshop
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?fields=$fields
     * @scope shop.read
     *
     * @param array $fields
     * @return mixed
     */
    public function get(array $fields = [])
    {
        $prepared = $this->api->shops($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Catches shops info and populates it into this instance
     * Future: Mergado might add "fields" param
     *
     * @method GET
     * @endpoint /api/shops/$id/info/
     * @scope shop.read
     *
     * @return MEshop
     */
    public function getInfo()
    {
        $fromApi = $this->api->shops($this->id)->info->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Gets projects of eshop
     * returns Collection of MProject instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?limit=$limit&offset=$offset&fields=$fields
     * @scope shop.projects.read
     *
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Support\Collection
     */
    public function getProjects(array $fields = [], $limit = 10, $offset = 0)
    {
        $prepared = $this->api->shops($this->id)->projects->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $projects = MProject::hydrate($this->api, $fromApi);

        return $projects;
    }

    /**
     * Gets eshop google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.gs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return static
     */
    public function getGoogleAnalytics($limit = 10, $offset = 0, array $fields = [], $dimensions = [], $metrics = [], $startDate = null, $endDate = null)
    {
        $prepared = $this->api->shops($this->id)->google->analytics->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

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

        $fromApi = $prepared->get()->data;

        $analytics = MAnalytics::hydrate($this->api, $fromApi);

        return $analytics;
    }

    /**
     * Sends notification to eshop members
     *
     * @method POST
     * @endpoint /api/shops/$id/notifications/
     * @scope shop.notify.write
     *
     * @param $notification
     * @return MNotification
     */
    public function sendNotification($notification)
    {
        $fromApi = $this->api->shop($this->id)->notifications->post($notification);

        $notif = new MNotification($fromApi, $this->api);

        return $notif;
    }

    /**
     * Get eshop statistics
     *
     * @method GET
     * @endpoint /api/shops/$id/stats/
     * @scope project.stats.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getStatistics($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->shops($this->id)->stats->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $stats = MStats::hydrate($this->api, $fromApi);
        return $stats;
    }

}