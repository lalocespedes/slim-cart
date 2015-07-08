<?php

$app->post('/update-item-quantity', function() use($app) {

	$request = $app->request;

	$items = array_combine($request->post('id'), $request->post('quantity'));

	foreach ($items as $key => $value) {
		
		if((int)$value === 0){

			$app->cart->remove($key);

		} else {

			$app->cart->update($key, 'quantity', (int)$value);

		}
	}

	$app->flash('global', 'Item updated');

	$app->response->redirect($app->urlFor('cart'));

})->name('update-item-quantity');