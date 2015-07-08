<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use lalocespedes\Cart\PlazaCart;
use lalocespedes\Product\Product;
use lalocespedes\Middleware\BeforeMiddleware;

ini_set('error_reporting', E_ALL);

define('INC_ROOT', dirname(__DIR__));

session_start();

require '../vendor/autoload.php';

$app = new Slim([
	'mode'	=> file_get_contents(INC_ROOT.'/mode.php'),
	'view'	=> new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->add(new BeforeMiddleware);

require '../app/routes.php';

$app->container->set('cart', function() {
	return new PlazaCart;
});

$app->container->set('product', function() {
	return new Product;
});

$view = $app->view();

$view->parseOptions = [
	'debug' => true
];

$view->parserExtensions = [
	new TwigExtension
];