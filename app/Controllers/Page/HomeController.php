<?php

declare(strict_types=1);

namespace App\Controllers\Page;

use App\Controllers\Controller;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('pages/home', [
            'title' => 'My',
        ]);
    }
}
