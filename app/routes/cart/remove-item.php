<?php

$app->get('/cart/remove-item/:id', function($id) use($app) {

	$app->cart->remove($id);

	$app->flash('global', 'Item removed');

	$app->response->redirect($app->urlFor('cart'));

})->name('remove-item');