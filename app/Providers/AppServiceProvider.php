<?php

namespace App\Providers;

use App\Repositories\DeviceRepository\DeviceRepository;
use App\Repositories\DeviceRepository\DeviceRepositoryInterface;
use App\Services\DeviceScanner\NmapDeviceScanner;
use App\Services\DeviceScanner\ScannerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
