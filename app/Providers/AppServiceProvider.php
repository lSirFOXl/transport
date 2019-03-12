<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Event;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if (true) {
            DB::listen(function ($sql, $bindings, $time) {
				$fileopen=fopen($_SERVER['DOCUMENT_ROOT']."/../logs.log", "a+");
				$write="[SQL]"."[".date(DATE_RFC822)."]"."[".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."] ".$sql." - "."(".implode(", ", $bindings).")"." - ".$time." \r\n";
				fwrite($fileopen,$write);
				fclose($fileopen);
			});
		}
		
		/*Event::listen('event.*', function ($eventName, array $data) {
			echo 1;
			echo ($eventName+"/"+data+"<br>");
		});
		Queue::after(function ($connection, $job, $data) {
            echo 1;
        });*/
		/*$query*/
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
