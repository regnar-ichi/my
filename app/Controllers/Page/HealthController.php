<?php

declare(strict_types=1);

namespace App\Controllers\Page;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\Response;
use Throwable;

final class HealthController extends Controller
{
    public function index(): void
    {
        $dbStatus = 'ok';
        $dbMessage = 'connected';

        try {
            Database::connection()->query('SELECT 1');
        } catch (Throwable $exception) {
            $dbStatus = 'error';
            $dbMessage = 'database connection failed';
        }

        Response::json([
            'status' => $dbStatus === 'ok' ? 'ok' : 'degraded',
            'project' => 'my',
            'checks' => [
                'app' => 'ok',
                'database' => $dbStatus,
            ],
            'message' => $dbMessage,
        ], $dbStatus === 'ok' ? 200 : 503);
    }
}
