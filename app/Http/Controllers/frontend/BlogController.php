<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $slug)
    // {
    //     $blogData = Blog::where('slug', $slug)->first();

    //     // Count unique visitors using session
    //     $blogKey = 'blog_' . $blogData->id;
    //     if (!session()->has($blogKey)) {
    //         $blogData->increment('visits_count');
    //         session()->put($blogKey, 1);
    //     }

    //     // Find the previous and next posts
    //     $previousPost = Blog::where('id', '<', $blogData->id)->orderBy('id', 'desc')->first();
    //     $nextPost = Blog::where('id', '>', $blogData->id)->orderBy('id')->first();

    //     $categoryName = Category::find($blogData->category_id)->name;
    //     $userData = User::find($blogData->author_id);

    //     // Fetch related posts by category, excluding the current post
    //     $relatedPosts = Blog::where('category_id', $blogData->category_id)
    //         ->where('id', '!=', $blogData->id)
    //         ->inRandomOrder()
    //         ->take(3)
    //         ->get();

    //     return view('frontend.blog.blog', compact('blogData', 'userData', 'categoryName', 'previousPost', 'nextPost', 'relatedPosts'));
    // }

    public function show(string $slug)
    {
        $blogData = Blog::where('slug', $slug)->first();

        // Count unique visitors using cookies
        $blogKey = 'blog_' . $blogData->id;
        $visited = request()->cookie($blogKey);
        if (!$visited) {
            $blogData->increment('visits_count');
            Cookie::queue($blogKey, true, 60 * 24 * 365); // This cookie lasts one year
        }

        // Find the previous and next posts
        $previousPost = Blog::where('id', '<', $blogData->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('id', '>', $blogData->id)->orderBy('id')->first();

        $categoryName = Category::find($blogData->category_id)->name;
        $userData = User::find($blogData->author_id);

        // Fetch related posts by category, excluding the current post
        $relatedPosts = Blog::where('category_id', $blogData->category_id)
            ->where('id', '!=', $blogData->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        $trendingPosts = Blog::orderBy('visits_count', 'desc')->take(3)->get();
        return response(view('frontend.blog.blog', compact('blogData', 'userData', 'categoryName', 'previousPost', 'nextPost', 'relatedPosts','trendingPosts')))
            ->cookie($blogKey, true, 60 * 24 * 365); // This cookie lasts one year
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
