<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
 */

if (file_exists(__DIR__ . '/../storage/framework/maintenance.php')) {
    require __DIR__ . '/../storage/framework/maintenance.php';
}

function MenuItem($link, $label) {

    echo ' <div class="menu-item">
    <a class="menu-link" href="' . $link . '">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">' . $label . '</span>
    </a>
</div>';

}

function HeaderBtn($Toggle, $Class, $Label, $Icon) {

    echo '  <button type="button" class="btn mx-1 float-end btn-sm  mb-2 ' . $Class . '" data-bs-toggle="modal" data-bs-target="#' . $Toggle . '">
    <i class="fas me-1 ' . $Icon . ' " aria-hidden="true"></i>' . $Label . '</button>';
}

function HeaderBtn2($Toggle, $Class, $Label, $Icon) {

    echo '  <button type="button" class="btn mx-1 float-end btn-sm  mb-2 ' . $Class . '" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#' . $Toggle . '">
    <i class="fas me-1 ' . $Icon . ' " aria-hidden="true"></i>' . $Label . '</button>';
}
function FromCamelCase($input) {
    $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
    preg_match_all($pattern, $input, $matches);
    $ret = $matches[0];
    foreach ($ret as &$match) {
        $match = $match == strtoupper($match) ?
        strtolower($match) :
        lcfirst($match);
    }
    return implode(' ', $ret);
}
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
 */

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
 */

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
