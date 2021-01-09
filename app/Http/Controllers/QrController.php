<?php

namespace App\Http\Controllers;

use View;

class QrController extends Controller
{
    public function test()
    {
        return View::make('qr');
    }
}
