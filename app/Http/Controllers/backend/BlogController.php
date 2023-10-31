<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Tag;



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


    // public function store(Request $request)
    // {
    //     $data = new Blog();

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('media'), $fileName);
    //         $data->thumbnail = $fileName;
    //     }

    //     $data->title = $request->input('title');
    //     $content = $request->input('content');
    //     $content = str_replace('&amp;', '&', $content);

    //     // Add classes to HTML heading tags.
    //     $content = preg_replace('/<h2>(.*?)<\/h2>/is', '<h2 class="mt-4 mb-3">$1</h2>', $content);
    //     $content = preg_replace('/<h3>(.*?)<\/h3>/is', '<h3 class="mt-5 mb-3">$1</h3>', $content);

    //     // Replace <blockquote><p> with <blockquote><i class="ti-quote-left mr-2"></i>
    //     // and </p></blockquote> with <i class="ti-quote-right ml-2"></i>
    //     $content = str_replace('<blockquote><p>', '<blockquote><i class="ti-quote-left mr-2"></i>', $content);
    //     $content = str_replace('</p></blockquote>', '<i class="ti-quote-right ml-2"></i></blockquote>', $content);

    //     $data->category_id = 1;
    //     $data->content = $content;
    //     $data->author_id = Auth::user()->id;
    //     $data->slug = Str::slug($request->input('title')); // Generate a slug based on the title
    //     $data->save(); // Save the basic data first to get the blog ID

    //     toastr()->success('Data updated successfully');
    //     return redirect()->back();
    // }

    // public function store(Request $request)
    // {
    //     $data = new Blog();

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('media'), $fileName);
    //         $data->thumbnail = $fileName;
    //     }
    //     if ($request->hasFile('banner')) {
    //         $file = $request->file('banner');
    //         $fileNameBanner = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('media'), $fileNameBanner);
    //         $data->banner = $fileNameBanner;
    //     }

    //     $data->title = $request->input('title');


    //     $content = $request->input('content');
    //     $content = str_replace('&amp;', '&', $content);


    //     // Add classes to HTML heading tags.
    //     $content = preg_replace('/<h2>(.*?)<\/h2>/is', '<h2 class="mt-4 mb-3">$1</h2>', $content);
    //     $content = preg_replace('/<h3>(.*?)<\/h3>/is', '<h3 class="mt-5 mb-3">$1</h3>', $content);

    //     // Replace <blockquote><p> with <blockquote><i class="ti-quote-left mr-2"></i>
    //     // and </p></blockquote> with <i class="ti-quote-right ml-2"></i>
    //     $content = str_replace('<blockquote><p>', '<blockquote><i class="ti-quote-left mr-2"></i>', $content);
    //     $content = str_replace('</p></blockquote>', '<i class="ti-quote-right ml-2"></i></blockquote>', $content);

    //     // Convert the images in the content to a row of columns.
    //     $content = preg_replace_callback('/<p>(.*?)<\/p>/is', function ($matches) use (&$content) {
    //         // Extract all of the img tags from the matched string.
    //         $imgTags = preg_match_all('/<img src="(.*?)" (.*?)>/is', $matches[1], $imgMatches);

    //         // If there are two img tags, then wrap them in a row of columns.
    //         if (count($imgMatches[0]) >= 2) {
    //             $content = '<div class="row">';
    //             foreach ($imgMatches[1] as $imgSrc) {
    //                 $content .= '<div class="col-lg-6 col-md-6">';
    //                 $content .= '<img src="' . $imgSrc . '" alt="post-ads" class="img-fluid mr-4 w-100">';
    //                 $content .= '</div>';
    //             }
    //             $content .= '</div>';
    //         }

    //         return $content;
    //     }, $content);
    //     $data->content = $content;

    //     $data->category_id = 1;
    //     $data->author_id = Auth::user()->id;
    //     $data->slug = Str::slug($request->input('title')); // Generate a slug based on the title
    //     $data->save(); // Save the basic data first to get the blog ID

    //     toastr()->success('Data updated successfully');
    //     return redirect()->back();
    // }

    public function store(Request $request)
    {
        $data = new Blog();


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('media'), $imageFileName);
            $data->thumbnail = $imageFileName;
        }

        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerFileName = time() . '_' . uniqid() . '.' . $bannerFile->getClientOriginalExtension();
            $bannerFile->move(public_path('media'), $bannerFileName);
            $data->banner = $bannerFileName;
        }


        $data->title = $request->input('title');


        // ... (existing code for file uploads, title, category, etc.)

        $content = $request->input('content');
        $content = str_replace('&amp;', '&', $content);

        // Add classes to HTML heading tags.
        $content = preg_replace('/<h2>(.*?)<\/h2>/is', '<h2 class="mt-4 mb-3">$1</h2>', $content);
        $content = preg_replace('/<h4>(.*?)<\/h4>/is', '<h3 class="mt-5 mb-3">$1</h3>', $content);

        // Replace <blockquote><p> with <blockquote><i class="ti-quote-left mr-2"></i>
        // and </p></blockquote> with <i class="ti-quote-right ml-2"></i></blockquote>
        $content = str_replace('<blockquote><p>', '<blockquote><i class="ti-quote-left mr-2"></i>', $content);
        $content = str_replace('</p></blockquote>', '<i class="ti-quote-right ml-2"></i></blockquote>', $content);

        // Modify <p> tags with images to wrap images in a row of columns.
        $content = preg_replace_callback('/<p>(.*?)<\/p>/is', function ($matches) {
            // Extract all of the img tags from the matched string.
            $imgTags = preg_match_all('/<img src="(.*?)" (.*?)>/is', $matches[1], $imgMatches);

            // Wrap the images in a row of columns if there are any.
            if (count($imgMatches[0]) >= 1) {
                $content = '<div class="row">';
                foreach ($imgMatches[1] as $imgSrc) {
                    $content .= '<div class="col-lg-6 col-md-6">';
                    $content .= '<img src="' . $imgSrc . '" alt="post-ads" class="img-fluid mr-4 w-100">';
                    $content .= '</div>';
                }
                $content .= '</div>';
            } else {
                // If no images are found, keep the original content.
                $content = '<p>' . $matches[1] . '</p>';
            }

            return $content;
        }, $content);

        // check if any new tag exist

        $tags = []; // Create an array to store tag values

        foreach ($request->tag as $tagValue) {
            Tag::firstOrCreate(['name' => $tagValue]);
            $tags[] = $tagValue; // Store each tag value in the array
        }

        $tagString = implode(' | ', $tags); // Concatenate the tags into a single string
        $data->content = $content;
        $data->category_id = $request->category;
        $data->author_id = Auth::user()->id;
        $data->slug = Str::slug($request->input('title'));
        $data->tags = $tagString;
        // Generate a slug based on the title
        $data->save(); // Save the basic data first to get the blog ID

        toastr()->success('Data updated successfully');
        // return redirect()->back(); 
        return to_route('user.blog.show', $data->slug);
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
