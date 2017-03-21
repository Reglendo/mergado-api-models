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
     * @param $id
     * @param array $fields
     * @return MUser
     */
    public function get($id, array $fields = []);

    /**
     * Sets 'permissions' attribute
     * To ensure we are getting them all set high $limit
     *
     * @method GET
     * @endpoint /users/$id/permissions/
     * @scope user.shops.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @return object
     */
    public function getPermissions($id, $limit = 10, $offset = 0);

    /**
     * Gets eshop
     *
     * @method GET
     * @endpoint /users/$id/shops/
     * @scope user.shops.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getEshops($id, $limit = 10, $offset = 0, array $fields = []);

    /**
     * Sends notification to user
     *
     * @method POST
     * @endpoint /api/users/$id/notifications/
     * @scope user.notify.write
     *
     * @param $id
     * @param $notification
     * @return object
     */
    public function sendNotification($id, $notification);

    /**
     * Gets users notifications
     *
     * @method GET
     * @endpoint /api/users/$id/notifications/
     * @scope user.notify.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getNotifications($id, $limit = 10, $offset = 0, array $fields = []);
}