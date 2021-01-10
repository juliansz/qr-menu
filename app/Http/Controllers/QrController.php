<?php

namespace App\Http\Controllers;

use View;

class QrController extends Controller
{
    public function test()
    {
        $logo = public_path('img/fast-food.png');
        return View::make('qr', compact('logo'));
    }
}
