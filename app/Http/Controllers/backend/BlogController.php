<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index_blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Blog();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('media'), $fileName);
            $data->thumbnail = $fileName;
        }
    
        $data->title = $request->input('title');
        $content = $request->input('content');
        $content = str_replace('&amp;', '&', $content);
    
        // Add classes to HTML heading tags.
        $content = preg_replace('/<h2>(.*?)<\/h2>/is', '<h2 class="mt-4 mb-3">$1</h2>', $content);
        $content = preg_replace('/<h3>(.*?)<\/h3>/is', '<h3 class="mt-5 mb-3">$1</h3>', $content);
    
        // Replace <blockquote><p> with <blockquote><i class="ti-quote-left mr-2"></i>
        // and </p></blockquote> with <i class="ti-quote-right ml-2"></i>
        $content = str_replace('<blockquote><p>', '<blockquote><i class="ti-quote-left mr-2"></i>', $content);
        $content = str_replace('</p></blockquote>', '<i class="ti-quote-right ml-2"></i></blockquote>', $content);
    
        $data->category_id = 1;
        $data->content = $content;
        $data->author_id = Auth::user()->id;
        $data->slug = Str::slug($request->input('title')); // Generate a slug based on the title
        $data->save(); // Save the basic data first to get the blog ID
    
        toastr()->success('Data updated successfully');
        return redirect()->back();
    }
    








   


    public function ckeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $timestamp = time(); // Get the current timestamp
            $fileName = $fileName . '_' . $timestamp . '.' . $extension; // Add the period (.) before the extension
            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
