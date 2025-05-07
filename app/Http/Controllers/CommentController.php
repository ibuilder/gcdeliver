<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Schedule;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string',
        ]);

        $commentableType = $validated['commentable_type'];
        $commentableId = $validated['commentable_id'];

        $modelClass = match ($commentableType) {
            'App\Models\Project' => Project::class,
            'App\Models\Schedule' => Schedule::class,
            default => null,
        };
        if (!$modelClass) {
            return back()->with('error', 'Invalid commentable type.');
        }

        $commentable = $modelClass::findOrFail($commentableId);

        $commentable->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $validated['body'],
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
