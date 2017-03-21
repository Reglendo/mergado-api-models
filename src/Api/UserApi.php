<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IUserApi;
use Reglendo\MergadoApiModels\Models\MNotification;
use Reglendo\MergadoApiModels\Models\MUser;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class UserApi
 * @package Reglendo\MergadoApiModels\Api
 */
class UserApi implements IUserApi
{
    use ApiAccess;

    /**
     * UserApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

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
    public function getUsers($limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->users
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

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
    public static function getAuthenticated(ApiClient $api, array $fields = [])
    {
        return $api->me
            ->fields($fields)->get();
    }

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
    public function get($id, array $fields = [])
    {
        return $this->apiClient->users($id)
            ->fields($fields)->get();
    }

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
    public function getPermissions($id, $limit = 10, $offset = 0)
    {
        return $this->apiClient->users($id)->permissions
            ->limit($limit)->offset($offset)
            ->get();
    }

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
    public function getEshops($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->users($id)->shops
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

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
    public function sendNotification($id, $notification)
    {
        return $this->apiClient->users($id)->notifications
            ->post($notification);
    }

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
    public function getNotifications($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->users($id)->notifications
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }
}