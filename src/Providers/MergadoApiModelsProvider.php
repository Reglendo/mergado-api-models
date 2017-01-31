<?php
namespace Reglendo\MergadoApiModels\Providers;

use Reglendo\MergadoApiModels\Models\MProject;
use Illuminate\Support\ServiceProvider;

class MergadoApiModelsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MergadoModels\ProjectModel', function ($app) {
            return new MProject($app["request"]->route()->parameter('project_id'));
        });


    }
}
