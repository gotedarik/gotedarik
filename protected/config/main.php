<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gotedarik',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.queue.*',
		'application.mongo.*',
		'application.mongoadapter.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	"language" => "tr",


	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
	
            'allowAutoLogin'=>true,

		),

		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(

				/*
				'urun/<id:\d+>/<title:.*?>'=>'urun/view',
				*/
				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'urun/<id:.*?>'=>'urun/view',
				'sirket/urunler/<id:.*?>'=>'sirket/urunler',
				'sirket/dokuman/<id:.*?>'=>'sirket/dokuman',
				'sirket/yeniurunler/<id:.*?>'=>'sirket/yeniurunler',
				'uye/iletisim/<id:.*?>'=>'uye/iletisim',
				'sirket/iletisim/<id:.*?>'=>'sirket/iletisim',
				'sirket/magazadegerlendirmeleri/<id:.*?>'=>'sirket/magazadegerlendirmeleri',
				'sirket/mesajyaz/<id:.*?>'=>'sirket/mesajyaz',
				'mesajlar/mesajoku/<id:.*?>'=>'mesajlar/mesajoku',
				'mesajlar/mesajyaz/<id:.*?>'=>'mesajlar/mesajyaz',
				'yardim/musterihizmetleri/<id:.*?>'=>'yardim/musterihizmetleri',
                'listem/listedetay/<id:\w+>' => 'listem/listedetay',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),


		'cache'=>array
        (
            'class'=>'CMemCache',
            
            'servers'=>array
            (
                array
                (
                    'host'=>'127.0.0.1',
                    'port'=>11211,
                    'weight'=>60,
                ),
                
            )
        ),	

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(

		"site_title"=>"Gotedarik",
		"site_keywords"=>"alışveriş, satılık, ikinci el, alış veriş, araba, araç, cep telefonu, fotoğraf makinesi, giyim, elbise, bilgisayar, elektronik, saat, mücevher, ayakkabı, çanta, şehir indirimleri, kitap, dvd, bebek, oyuncak, fiyatı, toptan, fırsat, indirim, ucuz, en ucuz",
		"site_description"=>"",
		"site_image"=>"",

		'imageTypes'=>array(
			"image/jpeg","image/gif","image/png","image/jpg"
		),
		"mongodb"=>array(
			"username"=>"gotedarik",
			"password"=>"fy23tz98",
			"db"=>"gotedarik"
		),
		'cdn'=>'https://s3.eu-central-1.amazonaws.com/organizetedarik/',
		// this is used in contact page
		'amazon'=>require(dirname(__FILE__).'/amazon.php'),
		'listPerPage' => 6,
		"productsearchpagesize"=>60,
		'listPerPageListe' => 10,
		
	),
);
