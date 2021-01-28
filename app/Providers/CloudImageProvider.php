<?php

namespace App\Providers;

use Cloudinary\Cloudinary;
use Illuminate\Support\ServiceProvider;

class CloudImageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cloudinary::class,function(){
            return new Cloudinary(config('project.CLOUDINARY_TOKEN'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
    }
}
