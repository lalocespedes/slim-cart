<?php

namespace lalocespedes\Product;

/**
* 
*/
class Product 
{

	public function get()
	{
		return [

			1 => [
				'name' => 'Macbooks Pro',
				'sku' => 'MBP8GB',
				'price' => 1200,
				'tax' => 200,
				'options' => array(
					'ram' => '8 GB',
					'ssd' => '256 GB'
				)
			],
			2 => [
				'name' => 'Iphone 6',
				'sku' => 'IP6123',
				'price' => 1100,
				'tax' => 100,
				'options' => array(
					'storage' => '16 GB',
					'color' => 'White'
				)
			]
		];
	}
}