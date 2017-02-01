<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;

/**
 * Class MUser
 * @package Reglendo\MergadoApiModels\Models
 */
class MUser extends MergadoApiModel
{

    /**
     * MUser constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
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
        $prepared = $this->api->users->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $users = MUser::hydrate($this->api, $fromApi);

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
        $prepared = $user->api->me;

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

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
        $prepared = $this->api->users($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

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
        $prepared = $this->api->users($this->id)->permissions->limit($limit)->offset($offset);

        $fromApi = $prepared->get()->data;

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
        $prepared = $this->api->users($this->id)->shops->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $eshops = MEshop::hydrate($this->api, $fromApi);

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
        $fromApi = $this->api->users($this->id)->notifications->post($notification);

        $notif = new MNotification($fromApi, $this->api);

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
        $prepared = $this->api->users($this->id)->notifications->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $notifs = MNotification::hydrate($this->api, $fromApi);

        return $notifs;
    }
}