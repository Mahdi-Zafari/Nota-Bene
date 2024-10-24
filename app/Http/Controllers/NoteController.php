<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $tagId = $request->input('tag');

        $notes = Auth::user()->notes()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->when($tagId, function ($queryBuilder) use ($tagId) {
                return $queryBuilder->whereHas('tags', function ($tagQuery) use ($tagId) {
                    $tagQuery->where('tags.id', $tagId);
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $tags = Tag::all();

        return view('notes.index', compact('notes', 'tags'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('notes.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array',
            'is_public' => 'boolean'
        ]);

        $note = Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content,
            'is_public' => $request->input('is_public', false),
        ]);

        $note->tags()->attach($request->tags);

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $tags = Tag::all();
        return view('notes.edit', compact('note', 'tags'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array',
            'is_public' => 'boolean'
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'is_public' => $request->input('is_public', false),
        ]);

        $note->tags()->sync($request->tags);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }

    public function dashboard()
    {
        $user = Auth::user();

        $publicNotes = Note::where('is_public', true)->orderBy('created_at', 'desc')->get();

        $noteCount = $user->noteCount();
        $taskCount = $user->tasks()->count();

        return view('dashboard', compact('publicNotes', 'noteCount', 'taskCount'));
    }
}
