<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class SearchController extends Controller
{


    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Blog::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'LIKE', "%$query%")
                ->orWhere('content', 'LIKE', "%$query%");
        })->get();
        
        
        

 return view('frontend.blog.search', ['results' => $results, 'query'=> $query]);
    }
    

}
