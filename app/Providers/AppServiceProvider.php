<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
        Schema::defaultStringLength(191);
        // Resource::withoutWrapping();

        Validator::extend('LCarIs', function ($attribute, $value, $parameters, $validator) {
            $request = $validator->getData();
            $table = resolve("App\\Models\\$parameters[0]")
                        ->where('container_id', $value)
                        ->where('content_id', $request['content_id'] ?? $request['data'][explode('.', $attribute)[1]]['content_id'])
                        ->latest('created_at')
                        ->first(); // PurchasingDeal

            return $parameters[2] == 'empty' ? $table->{$parameters[1]} != 0 : $table->{$parameters[1]} == 0;
        });

        Validator::replacer('LCarIs', function($message, $attribute, $rule, $parameters) {
            return "Last car is $parameters[2]";
        });

        Validator::extend('LteDBField', function ($attribute, $value, $parameters, $validator) {
            $request = $validator->getData();
            $table = resolve("App\\Models\\$parameters[0]")
                        ->where('container_id', $request['container_id'])
                        ->where('content_id', $request['content_id'])
                        ->latest('created_at')
                        ->first(); // PurchasingDeal
            return $table->{$parameters[1]} >= $value;
        });

        Validator::replacer('LteDBField', function($message, $attribute, $rule, $parameters) {
            return "$attribute must be less than or equal $parameters[1] in the last car";
            return str_replace(':field', $parameters[0], $message);
            return sprintf('%s must be greater than %s', $attribute, $parameters[0]);
        });
    }
}
