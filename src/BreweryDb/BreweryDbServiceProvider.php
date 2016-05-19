<?php

namespace Ethanclevenger91\BreweryDb;

use Ethanclevenger91\BreweryDb\BreweryDb;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class BreweryDbServiceProvider extends ServiceProvider {

  public function boot() {
    $this->publishes([
        __DIR__.'/../config/config.php' => config_path('brewerydb.php')
    ]);
  }

  public function register() {
      $this->app->singleton('brewerydb', function ($app) {
          return new BreweryDb(new Client([
            'base_uri' => 'http://api.brewerydb.com/{version}/'
          ]));
      });

      $this->app->alias('brewerydb', BreweryDb::class);

      $this->mergeConfig();
  }

    /**
     * Merges user's and brewerydb's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'brewerydb'
        );
    }
}
