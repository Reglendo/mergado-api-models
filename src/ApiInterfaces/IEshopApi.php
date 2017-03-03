<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Models\MEshop;
use Reglendo\MergadoApiModels\Models\MNotification;

interface IEshopApi
{


    /**
     * Get eshop
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?fields=$fields
     * @scope shop.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public static function get(ApiClient $apiClient, $id,  array $fields = []);

    /**
     * Catches shops info and populates it into this instance
     * Future: Mergado might add "fields" param
     *
     * @method GET
     * @endpoint /api/shops/$id/info/
     * @scope shop.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @return MEshop
     */
    public static function getInfo(ApiClient $apiClient, $id);

    /**
     * Gets projects of eshop
     * returns Collection of MProject instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?limit=$limit&offset=$offset&fields=$fields
     * @scope shop.projects.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Support\Collection
     */
    public static function getProjects(ApiClient $apiClient, $id, array $fields = [], $limit = 10, $offset = 0);

    /**
     * Gets eshop google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.gs.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return static
     */
    public static function getGoogleAnalytics(ApiClient $apiClient, $id, $limit = 10, $offset = 0,
                                       array $fields = [], $dimensions = [], $metrics = [],
                                       $startDate = null, $endDate = null);

    /**
     * Sends notification to eshop members
     *
     * @method POST
     * @endpoint /api/shops/$id/notifications/
     * @scope shop.notify.write
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param $notification
     * @return MNotification
     */
    public static function sendNotification(ApiClient $apiClient, $id, $notification);

    /**
     * Get eshop statistics
     *
     * @method GET
     * @endpoint /api/shops/$id/stats/
     * @scope project.stats.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getStatistics(ApiClient $apiClient, $id, $limit = 10, $offset = 0, array $fields = []);

}