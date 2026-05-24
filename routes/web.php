<?php

use App\Controllers\Page\HealthController;
use App\Controllers\Page\HomeController;

$router->add('', [HomeController::class, 'index']);
$router->add('health', [HealthController::class, 'index']);
