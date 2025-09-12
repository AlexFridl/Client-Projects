<?php

namespace App\Providers;

use App\Models\Podaci;
use App\Models\Slajder;
use App\Models\Tretman;

use App\Models\Kategorija;
use App\Models\TipTretmana;
use Illuminate\Http\Request;
use App\Models\Podkategorija;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        Paginator::useBootstrap();

    }

}
