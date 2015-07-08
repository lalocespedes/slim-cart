<?php

$app->get('/cart/add-item/:id', function($id) use($app) {

	if (array_key_exists($id, $app->product->get())) {
    	
    	$itemData = $app->product->get()[$id];

		if(!$itemData){

			echo "No existe";
		}

		$app->cart->insert($itemData);

		$app->flash('global', 'Item added');

		$app->response->redirect($app->urlFor('home'));
	
	} else {

		$app->flash('global', 'Product, dosent exists');

		$app->response->redirect($app->urlFor('home'));
	
	}

})->name('add-item');