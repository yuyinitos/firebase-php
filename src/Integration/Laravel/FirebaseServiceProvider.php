<?php namespace Firebase\Integration\Laravel;

use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app['firebase'] = $this->app->share(function($app) {

            return $app->make('Firebase\Firebase', array(
                $app['config']->get('services.firebase'),
                $app->make('GuzzleHttp\Client')
            ));

        });
    }

}