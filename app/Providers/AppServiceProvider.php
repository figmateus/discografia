<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Track;
use App\Repositories\AlbumRepository;
use App\Repositories\AlbumRepositoryInterface;
use App\Repositories\TrackRepository;
use App\Repositories\TrackRepositoryInterface;
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
        $this->app->bind(AlbumRepositoryInterface::class, 'App\Repositories\AlbumRepository');
        $this->app->bind(AlbumRepository::class, function(){
            return new AlbumRepository(new Album());
        });

        $this->app->bind(TrackRepositoryInterface::class, 'App\Repositories\TrackRepository');
        $this->app->bind(TrackRepositoryInterface::class, function(){
            return new TrackRepository(new Track());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
