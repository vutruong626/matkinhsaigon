<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        //
        Validator::extend('check_between_database', function($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $arrayCheck = Arr::get($data,substr($attribute, 0, strrpos($attribute, ".")));

            return DB::table($parameters[0])->where($parameters[1],$arrayCheck[$parameters[2]])->where($parameters[3],'>=',(int)$value)->exists();
            
          });   
    
        Validator::replacer('check_between_database', function($message, $attribute, $rule, $parameters) {
            return trans($message,['number' => $attribute]);
        });

        $informationPage = Setting::first();
        $policiesAndRegulations = Page::getPoliciesAndRegulations();
        View::share([
            'informationPage' => $informationPage,
            'policiesAndRegulations' => $policiesAndRegulations,
        ]);
    }
}
