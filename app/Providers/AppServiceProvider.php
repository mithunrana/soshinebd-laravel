<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\SiteProfile;
use App\District;
use App\HiringStatus;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(250);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view){
            $SiteProfile = SiteProfile::first();
            $DistrictList = District::get();
            $AllHiringStatus = HiringStatus::get();
            $view->with('SiteProfile',$SiteProfile);
            $view->with('DistrictList',$DistrictList);
            $view->with('ApplicationHiringStatus',$AllHiringStatus);
        });
    }
}
