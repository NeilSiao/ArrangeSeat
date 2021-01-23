<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('components.navbar', function($view){
            $segment = request()->segment(1);
        if ($segment == null) {
            $segment = 'home';
        }

        $activeNavbar = [
            'home',
            'dashboard',
            'login',
            'register',
            'randomSeat',
            'room' => ['room', 'roomSeat'],
            'student' => ['student', 'team'],
        ];
        $current = 'home';
        foreach ($activeNavbar as $key => $val) {
            if (is_array($val)) {
                $subMenu = $activeNavbar[$key];
                foreach ($subMenu as $subKey => $subVal) {

                    if ($subVal == $segment) {
                        $current = $key;
                        break 2;
                    }
                }
            }
            if ($val == $segment) {
                $current = $val;
                break;
            }
        }
        $view->with('current', '#' . $current);

        });
    }

}
