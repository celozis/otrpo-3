<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_id' => 'required|exists:cards,id',
            'text' => 'required|string|max:1000',
        ]);

        Comment::create([
            'card_id' => $validated['card_id'],
            'user_id' => auth()->id(),
            'text' => $validated['text'],
        ]);

        return back()->with('success', 'Комментарий добавлен!');
    }

}
