<?php

$app->get('/cart/clear', function() use($app) {

	$app->cart->clear();

	$app->flash('global', 'Cart cleared');

	$app->response->redirect($app->urlFor('home'));

})->name('clear');
