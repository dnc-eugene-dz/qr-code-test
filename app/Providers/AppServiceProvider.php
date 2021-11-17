<?php

namespace App\Providers;

use App\Repositories\QRCode\QRCodeRepository;
use App\Repositories\QRCode\QRCodeRepositoryInterface;
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
        $this->app->singleton(QRCodeRepositoryInterface::class, QRCodeRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
