<?php

declare(strict_types=1);

use Illuminate\Contracts\Console\Kernel as ConsoleKernel;

$app = require __DIR__.'/bootstrap/app.php';

$app->make(ConsoleKernel::class)->bootstrap();

return $app;
