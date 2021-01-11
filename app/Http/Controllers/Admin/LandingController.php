<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Http\Controllers\Controller;
use App\Models\Landing;

class LandingController extends Controller
{
    public function index()
    {
        $landings = Landing::all();
        return View::make('admin.landings.index', compact('landings'));
    }

    public function landing(Landing $landing)
    {
        return View::make('landing', compact('landing'));
    }
}
