<?php namespace Thujohn\Twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$configPath = __DIR__ . '/../../config/twitter.php';
		$this->mergeConfigFrom( $configPath, 'twitter' );
		$this->publishes( [ $configPath => config_path( 'thujohn-twitter.php' ) ] );

		$this->app['twitter'] = $this->app->share( function ()
		{
			return new \Thujohn\Twitter\Twitter;
		} );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [ 'ttwitter' ];
	}

}