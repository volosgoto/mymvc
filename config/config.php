<?php
//Config::get('site name');
Config::get('site name', 'your site');
Config::set('languages', array('ru', 'en'));
Config::set('routes', array(
    'default' => '',
    'admin' => 'admin',
));
Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');
