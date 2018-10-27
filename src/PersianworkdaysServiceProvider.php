<?php
/**
 * Created by PhpStorm.
 * User: Unlimited
 * Date: 10/23/2018
 * Time: 9:38 AM
 */

namespace PersianWorkdays;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PersianworkdaysServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/./../resources/views', 'PersianWorkdays');
    }

    public function register()
    {
        $this->registerPublishables();
    }

    private function registerPublishables()
    {
        $basePath = dirname(__DIR__);
        $arrPublishable = [
            'migrations' => [
                "$basePath/publishable/database/migrations" => database_path('migrations')
            ],
            'config' => [
                "$basePath/publishable/config/persian-workdays.php" => config_path('persian-workdays.php')
            ]
        ];

        foreach ($arrPublishable as $group => $paths) {
            $this->publishes($paths, $group);
        }
    }

}
