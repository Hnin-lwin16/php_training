<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\Task\TaskDaoInterface',  
        'App\Dao\Task\TaskDao');
        $this->app->bind('App\Contracts\Services\Task\TaskServiceInterface', 
        'App\Services\Task\TaskService');
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 
        'App\Dao\Student\StudentDao');
        $this->app->bind('App\Contracts\Services\Student\StudentServiceInterface', 
        'App\Services\Student\StudentService');
        $this->app->bind('App\Contracts\Dao\Major\MajorDaoInterface', 
        'App\Dao\Major\MajorDao');
        $this->app->bind('App\Contracts\Services\Major\MajorServiceInterface', 
        'App\Services\Major\MajorService');
        $this->app->bind('App\Contracts\Dao\ApiStu\ApiDaoInterface', 
        'App\Dao\ApiStu\ApiDao');
        $this->app->bind('App\Contracts\Services\ApiStu\ApiServiceInterface', 
        'App\Services\ApiStu\ApiService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
