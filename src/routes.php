<?php

use Slim\App;

return function (App $app) {
//    $container = $app->getContainer();
//
//    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
//        // Sample log message
//        $container->get('logger')->info("Slim-Skeleton '/' route");
//
//        // Render index view
//        return $container->get('renderer')->render($response, 'index.phtml', $args);
//    });

    $app->get('/', "\Controllers\index_controller:index");
    $app->map(array('GET','POST'),'/csrf/{method}', "Controllers\csrf\csrf_controller:method");
    $app->get('/aes/{method}', "\Controllers\\encryption\aes_controller:method");
    $app->get('/rsa/{method}', "\Controllers\\encryption\\rsa_controller:method");
    $app->get('/sql/{method}', "\Controllers\sql\sql_controller:method");
    $app->get('/ssrf', "\Controllers\ssrf\ssrf_controller:index");
    $app->get('/url', "\Controllers\url\url_controller:index");
    $app->get('/xss/{method}', "\Controllers\xss\xss_controller:method");


};
