<?php

namespace App\Responses;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ApiResponse', function () {
            return new ApiResponse();
        });
    }
}
