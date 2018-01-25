<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 21.01.18
 * Time: 11:09
 */
namespace SilenceCloud\SilenceFrontEnd;

use Http\HttpRequest;
use Http\HttpResponse;
use SilenceCloud\SilenceFrontEnd\Core\Controllers\Ths;

$request = new HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new HttpResponse;

$route = [
    ['GET', '/', function() use ($request, $response) {
        $ths = new Ths($request, $response);
        $ths->getFirstPage();
    }],
];

return $route;
