<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TheLoai;
use App\Skill;
use App\UserPoint;
use App\Grammar;
use Illuminate\Support\Facades\Auth;//Dang nhap

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $theloai = TheLoai::all();
        $skill = Skill::all();
        $grammar = Grammar::all();
        view()->share('grammar', $grammar); 
        view()->share('skill', $skill); 
        view()->share('theloai', $theloai); 
        
    }

    

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
