<?php

namespace App\Providers;

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
        // 幾分鐘前發布
        // https://www.wangjingxian.cn/laravel/84.html
        \Carbon\Carbon::setLocale('zh-TW');
    }
}
