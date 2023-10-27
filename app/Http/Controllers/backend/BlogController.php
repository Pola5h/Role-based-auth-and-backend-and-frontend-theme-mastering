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
// dd($request->all());
        // dd( $request->all());
        $data = new Blog();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('media'), $file_name);
            $data->thumbnail = $file_name;
        }

        $data->title = $request->input('title');
        $data->content = $request->input('content');
        $data->category_id = 1;

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
