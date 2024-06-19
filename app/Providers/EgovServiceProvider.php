<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use App\EgovAPI\Egov;

class EgovServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $egov_config = array(
            'dev' => config('egov.dev'),
            'client_id' => config('egov.software_id'),
            'api_key' => config('egov.api_key'),
            'redirect_uri' => config('egov.redirect_uri')
        );
        Egov::config($egov_config);
    }
}
