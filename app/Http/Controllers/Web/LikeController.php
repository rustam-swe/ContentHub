<?php

namespace App\Http\Controllers\Web;

use App\Models\Content;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, $id)
    {
        $user = $request->user();
        $content = Content::findOrFail($id);

        if ($content->likedUsers()->where('user_id', $user->id)->exists()) {
            $content->likedUsers()->detach($user->id);
            return redirect()->back()->with('message', 'Unliked');
        } else {
            $content->likedUsers()->attach($user->id);
            return redirect()->back()->with('message', 'Liked');
        }
    }
}
