<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Core
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();

        return view('welcome', [
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

        Tag::create($request->all());

        return redirect('/');
    }

    public function edit(Tag $tag)
    {
        $tags = Tag::get();

        return view('welcome', [
            'tag' => $tag,
            'tags' => $tags,
        ]);
    }

    public function update(Tag $tag, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,'.$tag->id
        ]);

        $tag->update($request->all());

        return redirect('/');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/');
    }
}
