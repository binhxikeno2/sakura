<?php

namespace App\Providers;

use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('urlPublic',getenv('urlPublic'));
        View::share('urlAdmin',getenv('urlAdmin'));
        View::share('urlAuth',getenv('urlAuth'));
        $menu = DB::table('categories')->where('id_sub',0)->get();
        View::share('menu',$menu);
    }
}
