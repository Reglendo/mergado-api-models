<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\UserApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IUserApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MUser
 * @package Reglendo\MergadoApiModels\Models
 */
class MUser extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IUserApi
     */
    private $api;

    /**
     * MUser constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new UserApi();
        $this->api->setClient($apiClient);
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
        $fromApi = $this->api->getUsers($limit, $offset, $fields)->data;

        $users = MUser::hydrate($this->api->getClient(), $fromApi);

        return $users;
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
        $user = new self([], $api);

        $fromApi = UserApi::getAuthenticated($api, $fields)->get();

        $user->populate($fromApi);

        return $user;
    }

    /**
     * Gets user with currently set id
     * This might end up with 404 due to missing 'id' attribute
     *
     * @method GET
     * @endpoint /users/$id/
     * @scope user.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        $fromApi = $this->api->get($this->id, $fields);

        $this->populate($fromApi);

        return $this;
    }

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
     * @return $this
     */
    public function getPermissions($limit = 10, $offset = 0)
    {
        $fromApi = $this->api->getPermissions($this->id, $limit, $offset)->data;

        $this->permissions = $fromApi;

        return $this;
    }

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
    public function getEshops($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getEshops($this->id, $limit, $offset, $fields)->data;

        $eshops = MEshop::hydrate($this->api->getClient(), $fromApi);

        return $eshops;
    }

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
    public function sendNotification($notification)
    {
        $fromApi = $this->api->sendNotification($this->id, $notification);

        $notif = new MNotification($fromApi, $this->api->getClient());

        return $notif;
    }

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
    public function getNotifications($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getNotifications($this->id, $limit, $offset, $fields)->data;

        $notifs = MNotification::hydrate($this->api->getClient(), $fromApi);

        return $notifs;
    }
}