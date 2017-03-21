<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Models\MNotification;
use Reglendo\MergadoApiModels\Models\MUser;

/**
 * Interface IUserApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IUserApi extends HasApiClient
{

    /**
     * Gets all users authenticated client has access to
     *
     * @method GET
     * @endpoint /users/
     * @scope user.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getUsers($limit = 10, $offset = 0, array $fields = []);

    /**
     * Gets user currently authenticated with token
     *
     * @method GET
     * @endpoint /me/
     * @scope user.read
     *
     * @param ApiClient $api
     * @param array $fields
     * @return MUser
     */
    public static function getAuthenticated(ApiClient $api, array $fields = []);

    /**
     * Gets user with currently set id
     * This might end up with 404 due to missing 'id' attribute
     *
     * @method GET
     * @endpoint /users/$id/
     * @scope user.read
     *
     * @param array $fields
     * @return MUser
     */
    public function get(array $fields = []);

    /**
     * Sets 'permissions' attribute
     * To ensure we are getting them all set high $limit
     *
     * @method GET
     * @endpoint /users/$id/permissions/
     * @scope user.shops.read
     *
     * @param int $limit
     * @param int $offset
     * @return MUser
     */
    public function getPermissions($limit = 10, $offset = 0);

    /**
     * Gets eshop
     *
     * @method GET
     * @endpoint /users/$id/shops/
     * @scope user.shops.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getEshops($limit = 10, $offset = 0, array $fields = []);

    /**
     * Sends notification to user
     *
     * @method POST
     * @endpoint /api/users/$id/notifications/
     * @scope user.notify.write
     *
     * @param $notification
     * @return MNotification
     */
    public function sendNotification($notification);

    /**
     * Gets users notifications
     *
     * @method GET
     * @endpoint /api/users/$id/notifications/
     * @scope user.notify.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getNotifications($limit = 10, $offset = 0, array $fields = []);
}