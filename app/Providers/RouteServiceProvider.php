<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAjaxRoutes();

        $this->mapSubAgentRoutes();

        $this->mapAdminRoutes();

        $this->mapEmployeeRoutes();
       
        $this->mapICFEIRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    
    protected function mapAjaxRoutes(){
        Route::group([
            'namespace' => $this->namespace,
            'prefix' => 'ajax',
        ], function ($router) {
            require base_path('routes/ajax.php');
        });
    }

    protected function mapSubAgentRoutes(){
       
        // Route::middleware('SubAgent')
        // ->namespace($this->namespace)
        // ->prefix('subagent')
        // ->group(base_path('routes/subagent.php'));
        
        Route::group([
            // 'middleware' => 'App\Http\Middleware\SubAgent',
            'namespace' =>$this->namespace,
            'prefix'    =>'subagent',
        ],function ($router){
            require base_path('routes/subagent.php');
        });
    }

    protected function mapAdminRoutes(){
        
        Route::group([
            'namespace' =>$this->namespace,
            'prefix'    =>'admin',
        ],function ($router){
            require base_path('routes/admin.php');
        });
    }

    protected function mapEmployeeRoutes(){
        Route::group([
            'namespace' => $this->namespace,
            'prefix'    => 'employee',
        ],function($router){
            require base_path('routes/employee.php');
        });
        
    }

    protected function mapICFEIRoutes(){
        
        Route::group([
            'namespace' => $this->namespace,
            'prefix'    => 'icfei',
        ], function($router){
            require base_path('routes/icfei.php');
        });
    }

}
