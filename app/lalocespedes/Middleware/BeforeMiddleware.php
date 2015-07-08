<?php

namespace lalocespedes\Middleware;

use Slim\Middleware;
/**
* 
*/
class BeforeMiddleware extends Middleware
{
	
	function call()
	{
		$this->app->hook('slim.before', [$this, 'run']);

		$this->next->call();
	}

	public function run()
	{
		$this->app->view()->appendData([
			'cart'	=> $this->app->cart
		]);
	}
}
