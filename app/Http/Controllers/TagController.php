<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tags = Tag::when($search, function ($queryBuilder) use ($search) {
            return $queryBuilder->where('name', 'like', '%' . $search . '%');
        })
            ->get();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:tags']);
        Tag::create(['name' => $request->name]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
