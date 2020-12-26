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

        Validator::extend('LteDBField', function ($attribute, $value, $parameters, $validator) {
            $request = $validator->getData();
            $table = resolve("App\\Models\\$parameters[0]")
                        ->where('container_id', $request['container_id'])
                        ->where('content_id', $request['content_id'])
                        ->latest('created_at')
                        ->first(); // PurchasingDeal
            return ($table->{$parameters[1]} != 0 && $table->{$parameters[1]} >= $value);
        });

        Validator::replacer('LteDBField', function($message, $attribute, $rule, $parameters) {
            return "$attribute must be greater than $parameters[1] in the last car OR Last car has been finished";
            return str_replace(':field', $parameters[0], $message);
            return sprintf('%s must be greater than %s', $attribute, $parameters[0]);
        });
    }
}
