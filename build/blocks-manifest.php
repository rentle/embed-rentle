<?php
// This file is generated. Do not modify it manually.
return array(
	'shop-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'embed-rentle/shop-block',
		'version' => '0.1.0',
		'title' => 'Twice Commerce shop block',
		'keywords' => array(
			'rentle',
			'twice'
		),
		'attributes' => array(
			'shopId' => array(
				'type' => 'string'
			),
			'locationId' => array(
				'type' => 'string'
			),
			'categoryId' => array(
				'type' => 'string'
			),
			'productId' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'string'
			),
			'paddingSize' => array(
				'type' => 'string'
			),
			'disableAutoScroll' => array(
				'type' => 'boolean',
				'default' => false
			),
			'disableHeightAnimation' => array(
				'type' => 'boolean',
				'default' => false
			),
			'locationsView' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'category' => 'widgets',
		'supports' => array(
			'html' => false,
			'reusable' => true,
			'align' => array(
				'full',
				'wide'
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true,
				'blockGap' => false
			)
		),
		'textdomain' => 'embed-rentle',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);
