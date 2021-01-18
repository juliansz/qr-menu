<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContentRequest;
use App\Models\Content;
use App\Models\Landing;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Landing $landing)
    {
        $contents = Content::fromLanding($landing)->get();
        return View::make('admin.contents.index', compact('landing', 'contents'));
    }

    public function edit(Landing $landing, Content $content)
    {
        return View::make('admin.contents.edit', compact('landing', 'content'));
    }

    public function update(CreateContentRequest $request, Landing $landing, Content $content)
    {
        $input = $request->all();
        $content->update($input);
        $content->save();

        return redirect()->route('admin.contents.index', $landing);
    }

    public function create(Landing $landing)
    {
        return View::make('admin.contents.edit', compact('landing'));
    }

    public function store(CreateContentRequest $request, Landing $landing)
    {
        $input = $request->all();

        Content::create($input);
        return redirect()->route('admin.contents.index', $landing);
    }


    public function confirmDelete(Landing $landing, Content $content)
    {
        return View::make('admin.contents.delete', compact('landing', 'content'));
    }

    public function delete(Landing $landing, Content $content)
    {
        $content->delete();
        return redirect()->route('admin.contents.index', $landing);
    }

    public function content(Landing $landing, Content $content)
    {
        return View::make('content', compact('landing', 'content'));
    }
}
