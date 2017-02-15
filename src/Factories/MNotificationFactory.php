<?php
namespace Reglendo\MergadoApiModels\Factories;

use Carbon\Carbon;

/**
 * Class MNotificationFactory
 * @package Reglendo\MergadoApiModels\Factories
 */
class MNotificationFactory
{

    /**
     * @param string $title
     * @param string $body
     * @param array $channels
     * @param string $created_at
     * @param string $priority
     * @param string $scope
     * @return array
     */
    public static function create(string $title, string $body, array $channels = [], string $created_at = "", string $priority = "high", string $scope = "shop")
    {
        $notif = [];

        $notif["title"] = $title;
        $notif["body"]= $body;

        $notif["chanells"] = $channels;
        $notif["created_at"] = $created_at ? $created_at : Carbon::now()->toDateTimeString();
        $notif["priority"] = $priority;
        $notif["scope"] = $scope;

        return $notif;
    }
}