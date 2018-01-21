<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 20.01.18
 * Time: 18:54
 */

namespace SilenceCloud\SilenceFrontEnd;

use Auryn\ConfigException;
use Auryn\Injector;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Http\HttpRequest;
use Http\HttpResponse;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
$environment = 'development';

/**
 * Register the error handler
 */
$whoops = new Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo $e;
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();

$injector = new Injector;

try {
    $injector->alias('Http\Request', 'Http\HttpRequest');
    $injector->share('Http\HttpRequest');
    $injector->alias('Http\Response', 'Http\HttpResponse');
    $injector->share('Http\HttpResponse');
} catch (ConfigException $e) {
    $e->getMessage();
}
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new HttpResponse;

$routeDefinitionCallback = function (RouteCollector $r) {
    $routes = include('Router.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};


$dispatcher = \FastRoute\simpleDispatcher($routeDefinitionCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

return $injector;