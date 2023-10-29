<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;

class likeController extends Controller
{
    public function store(Request $request)
    {

        $like = Like::where('user_id', auth()->id())
            ->where('blog_id', $request->post_id)
            ->first();

        if ($like) {
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'blog_id' => $request->post_id,
            ]);
            return response()->json(['status' => 'liked']);
        }
    }

  
    

}
