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
     * @var array
     */
    public $notif = [
        'title' => null,
        'body' => null,
        'chanells' => [],
        'priority' => 'high',
        'scope' => 'shop'
    ];


    /**
     * @var array
     */
    protected $eshop = [
        'id' => null,
        'name' => null
    ];

    /**
     * @var array
     */
    protected $project = [
        'id' => null,
        'name' => null
    ];


    /**
     * MNotificationFactory constructor.
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->eshop['id'] = (isset($attributes['eshop_id'])) ? $attributes['eshop_id'] : null;
        $this->eshop['name'] = (isset($attributes['eshop_name'])) ? $attributes['eshop_name'] : null;

        $this->project['id'] = (isset($attributes['project_id'])) ? $attributes['project_id'] : null;
        $this->project['name'] = (isset($attributes['project_name'])) ? $attributes['project_name'] : null;

        $this->notif = array_merge($this->notif, $attributes);
        $this->notif['created_at'] = Carbon::now()->toDateTimeString();

        $this->setPrefix();
    }

    /**
     * Set prefix to body attribute of $this->notif property
     */
    public function setPrefix()
    {
        $parts = [
            '**' . config("app.name") . '**',
            ($this->eshop['id'] && $this->eshop['name']) ? ', **[' . $this->eshop['name'] . '](mergado://app/shops/' . $this->eshop['id'] . '/)**' : '',
            ($this->project['id'] && $this->project['name']) ? ' - **[' . $this->project['name'] . '](mergado://app/projects/' . $this->project['id'] . '/)**' : '',
            ': '
        ];

        $this->notif['body'] = implode('', $parts) . $this->notif['body'];
    }
}