<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return View::make('admin.index');
    }
}
