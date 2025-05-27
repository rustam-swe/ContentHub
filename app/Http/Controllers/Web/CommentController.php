<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Comment;

class CommentController
{
    public function store(Request $request, $contentId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $content = Content::findOrFail($contentId);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $request->user()->id;
        $comment->content_id = $content->id;
        $comment->save();

        return redirect()->back()->with('message', 'Comment added successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->id() !== $comment->user_id) {
            abort(403); // Ruxsat yo'q
        }

        $comment->delete();

        return redirect()->back()->with('message', 'Comment deleted successfully.');
    }
}
