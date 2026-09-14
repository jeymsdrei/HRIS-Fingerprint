<?php

declare(strict_types=1);

use Illuminate\Container\Container;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Http\Kernel as HttpKernel;

$app = require __DIR__.'/bootstrap/app.php';

$app->make(ConsoleKernel::class)->bootstrap();

return $app;
