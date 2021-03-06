<?php

require dirname(__DIR__) . '/src/Autoloader.php';

//point to the vendor dir where all external dependencies are installed/downloaded
$vendor = dirname(__DIR__) . '/vendor';

//construct and register the autoloader
$loader = new \Firebase\Psr4AutoloaderClass();
$loader->register();

//load guzzle dependency
$loader->addNamespace('GuzzleHttp\\Stream\\', $vendor . '/guzzlehttp/streams/src');
$loader->addNamespace('GuzzleHttp\\Ring\\', $vendor . '/guzzlehttp/ringphp/src');
$loader->addNamespace('GuzzleHttp\\', $vendor . '/guzzlehttp/guzzle/src');

//load php-jwt, not namespaced
require $vendor . '/firebase/php-jwt/Firebase/PHP-JWT/Authentication/JWT.php';

//load react dependencies
$loader->addNamespace('React\\Promise\\', $vendor . '/react/promise/src');
require $vendor . '/react/promise/src/functions.php';

//load firebase repository
$loader->addNamespace('Firebase\\', dirname(__DIR__) . '/src');

$fb = new Firebase\Firebase(array(
    'token' => $argv[1],
    'base_url' => $argv[2],
    'timeout' => 30
), new GuzzleHttp\Client());

print_r($fb->get($argv[3]));
