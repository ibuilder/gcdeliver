<?php

use App\Console\Kernel as AppConsoleKernel;
use Illuminate\Contracts\Console\Kernel as IlluminateContractsConsoleKernel;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use App\Http\Kernel as AppHttpKernel;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandler;
use App\Exceptions\Handler as AppExceptionsHandler;

$app = new Application(dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    HttpKernel::class,
    AppHttpKernel::class
);

$app->singleton(
    ExceptionHandler::class,
    AppExceptionsHandler::class
);

$app->singleton(IlluminateContractsConsoleKernel::class, AppConsoleKernel::class);

return $app;
