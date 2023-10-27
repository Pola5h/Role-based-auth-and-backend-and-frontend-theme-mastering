@extends('frontend.master')
@section('frontend')
@include('frontend.body.main_header')

@php

$slider_blog = \App\Models\Blog::latest()->take(5)->get();
$category_list = \App\Models\Category::all();
$blog_articles = \App\Models\Blog::paginate(1);


@endphp

<section class="slider mt-4">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-12 col-sm-12 col-md-12 slider-wrap">

                @foreach ( $slider_blog as $blog )


                <div class="slider-item">
                    <div class="slider-item-content">
                        <div class="post-thumb mb-4">
                            <a href="#">
                                <img src="{{ asset('media/' . $blog->thumbnail) }}" alt="" class="img-fluid">
                            </a>
                        </div>

                        <div class="slider-post-content">
                            <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">

                                {{ $category_list->firstWhere('id', $blog->category_id)->name }}

                            </span>
                            <h3 class="post-title mt-1"><a href="#">{{$blog->title}}</a></h3>
                            <span class=" text-muted  text-capitalize">{{ $blog->created_at->format('F j, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">

@foreach ($blog_articles as $articles)
<div class="col-lg-3 col-md-6">
    <article class="post-grid mb-5">
        <a class="post-thumb mb-4 d-block" href="#">
            <img src="{{ asset('media/' . $articles->thumbnail) }}" alt=""
                class="img-fluid w-100">
        </a>
        <span
            class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1"> {{ $category_list->firstWhere('id', $articles->category_id)->name }}</span>
        <h3 class="post-title mt-1"><a href="#">The best place to explore to
                enjoy</a></h3>

        <span class="text-muted letter-spacing text-uppercase font-sm">June 15, 2019</span>

    </article>
</div>
@endforeach

              




                </div>
            </div>


            <div class="m-auto">
                <div class="pagination mt-5 pt-4">
                    <ul class="list-inline">
                        @if ($blog_articles->onFirstPage())
                            <li class="list-inline-item disabled"><span>&laquo;</span></li>
                        @else
                            <li class="list-inline-item"><a href="{{ $blog_articles->previousPageUrl() }}">&laquo;</a></li>
                        @endif
            
                        @foreach ($blog_articles->getUrlRange(1, $blog_articles->lastPage()) as $page => $url)
                            @if ($page == $blog_articles->currentPage())
                                <li class="list-inline-item active"><a class="active"><span>{{ $page }}</span></a></li>
                            @else
                                <li class="list-inline-item"><a  href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
            
                        @if ($blog_articles->hasMorePages())
                            <li class="list-inline-item"><a href="{{ $blog_articles->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="list-inline-item disabled"><span>&raquo;</span></li>
                        @endif
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection