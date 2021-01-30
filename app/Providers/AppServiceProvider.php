<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CourseCategory;
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
        View::composer(['web.include.header','web.include.footer'], function($view){
            $category= CourseCategory::where('status',1)->latest()->get();
            $header_data =['category'=>$category];
            $view->with('header_data',$header_data);
         });
    }
}
