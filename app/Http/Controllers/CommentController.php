<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware(['auth', 'verified'])->except('show');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return response()->json(['success' => 'Comment added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::where('blog_id', $id)->get();
    
        return response()->json([
            'comments' => $comments->map(function ($comment) {
                $userdata = User::find($comment->user_id);
                return [
                    'user' => $userdata->name,
                    'image'=> $userdata->image,
                    'date' => $comment->created_at->format('h:i A, d M Y'),
                    'content' => $comment->comment,
                ];
            }),
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
