<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Core
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();
        
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $tags
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

       
        $tag = Tag::create($request->all());

        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'successfuly'
        ]);
    }

    public function edit(Tag $tag)
    {
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $tag
        ]);
    }

    public function update(Tag $tag, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,'.$tag->id
        ]);

        $tag->update($request->all());

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'successfuly'
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'status' => true,
            'code' => 204,
            'data' => $tag
        ]);
    }
}
