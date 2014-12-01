<?php
return[
    'settings' => [
        'path' => ANAX_INSTALL_PATH . 'theme/',
        'name' => 'anax-base',
    ],

	'views' => [
		[
			'region' => 'header',
			'template' => 'blackgate/header',
			'data' => [
				'siteTitle' => "Blackgate Demo",
				'siteTagline' => "Test the Blackgate user-authentication package",
			],
			'sort' => -1
		],

	],

	'data' => [

        // Language for this page.
        'lang' => 'sv',

        // Append this value to each <title>
        'title_append' => ' | Anax a web template',

        // Stylesheets
        'stylesheets' => ['css/blackgate.css'],

        // Inline style
        'style' => null,

        // Favicon
        'favicon' => 'favicon.ico',

        // Path to modernizr or null to disable
        'modernizr' => 'js/modernizr.js',

        // Path to jquery or null to disable
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',

        // Array with javscript-files to include
        'javascript_include' => [],

        // Use google analytics for tracking, set key or null to disable
        'google_analytics' => null,
    ],
];