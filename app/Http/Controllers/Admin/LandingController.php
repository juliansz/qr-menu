<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Http\Controllers\Controller;
use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landings = Landing::all();
        return View::make('admin.landings.index', compact('landings'));
    }

    public function edit(Landing $landing)
    {
        return View::make('admin.landings.edit', compact('landing'));
    }

    public function update(Request $request, Landing $landing)
    {
        $input = $request->all();
        $landing->update($input);
        $landing->save();

        return redirect()->route('admin.landings.index');
    }

    public function create()
    {
        return View::make('admin.landings.edit');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Landing::create($input);
        return redirect()->route('admin.landings.index');
    }

    public function delete(Landing $landing)
    {
        $landing->delete();
        return redirect()->route('admin.landings.index');
    }

    public function landing(Landing $landing)
    {
        return View::make('landing', compact('landing'));
    }
}
