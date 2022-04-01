<?php

namespace App\Providers;

use App\Models\Option;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('toast', function ($type, $message) {
            return $this->session()->flash('toast', compact('type', 'message'));
        });

        Relation::enforceMorphMap([
            'catalog' => 'App\Models\Catalog',
            'product' => 'App\Models\Product',
            'brand' => 'App\Models\Brand',
        ]);

        if (! app()->runningInConsole()) {
            Option::whereNotNull('config')->get()->map(function($option) {
                config([$option->config => $option->value]);
            });
        }
    }
}
