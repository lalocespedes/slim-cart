<?php

$app->get('/cart', function() use($app) {

	$app->render('cart/summary.twig');

})->name('cart');
