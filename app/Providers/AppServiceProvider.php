<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Kriteria;
use App\Models\Mk_Plhn;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share commonly needed collections with all views to avoid undefined variable errors
        try {
            $kriterias = Kriteria::all();
            $mataKuliah = Mk_Plhn::all();
            $users = User::all();
            View::share('kriterias', $kriterias);
            View::share('mataKuliah', $mataKuliah);
            View::share('users', $users);
        } catch (\Throwable $e) {
            // In early boot or during migrations this may fail; ignore to avoid breaking artisan commands
        }
    }
}
