<?php

use BEAR\Package\Bootstrap;
use BEAR\Resource\ResourceObject;

require dirname(__DIR__) . '/bin/autoload.php';

/* @global string $context */
$app = (new Bootstrap)->getApp('MyVendor\Locale', $context, dirname(__DIR__));
$request = $app->router->match($GLOBALS, $_SERVER);

try {
    $page = $app->resource->{$request->method}->uri($request->path)();
    /* @var $page ResourceObject */
    /* @global \BEAR\Resource\Vary $vary */
    if (isset($vary)) {
        $page->headers['Vary'] = $vary;
    }
    $page->transfer($app->responder, $_SERVER);
    exit(0);
} catch (\Exception $e) {
    $app->error->handle($e, $request)->transfer();
    exit(1);
}
