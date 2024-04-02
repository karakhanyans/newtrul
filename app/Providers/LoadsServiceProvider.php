<?php

namespace App\Providers;

use App\Services\LoadsService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class LoadsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(LoadsService::class, function () {
            $client = Http::baseUrl(config('services.loads.base_url'))
                ->withToken(config('services.loads.token'))
                ->withHeaders([
                    'mc-number' => 123,
                    'dot_number' => 123,
                    'carrier-email' => 'karakhanyansa@gmail.com',
                ]);

            return new LoadsService($client);
        });
    }
}
