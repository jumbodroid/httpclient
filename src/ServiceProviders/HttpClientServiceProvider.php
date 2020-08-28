<?php

namespace Rayalois22\HttpClient\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Psr\Http\Client\ClientInterface;
use Rayalois22\HttpClient\Contracts\HttpClient;
use Rayalois22\HttpClient\Psr18\Client;

/**
 * @author  Alois Odhiambo  <rayalois22@gmail.com>
 */
class HttpClientServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the package.
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Publish the Config file from the Package to the App directory
        |--------------------------------------------------------------------------
        */
        $this->configPublisher();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | Implementation Bindings
        |--------------------------------------------------------------------------
        */
        $this->implementationBindings();

        /*
        |--------------------------------------------------------------------------
        | Facade Bindings
        |--------------------------------------------------------------------------
        */
        $this->facadeBindings();

        /*
        |--------------------------------------------------------------------------
        | Registering Service Providers
        |--------------------------------------------------------------------------
        */
        $this->serviceProviders();
    }

    /**
     * Implementation Bindings
     */
    private function implementationBindings()
    {
        $this->app->bind(ClientInterface::class, Client::class);
        $this->app->bind(HttpClient::class, Client::class);
    }

    /**
     * Publish the Config file from the Package to the App directory
     */
    private function configPublisher()
    {
        // code
    }

    /**
     * Facades Binding
     */
    private function facadeBindings()
    {
        // code
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Registering Other Custom Service Providers (if you have)
     */
    private function serviceProviders()
    {
        // $this->app->register('...\...\...');
    }

}
