@extends('frontend.master')
@section('frontend')
@section('title', 'Blog of ' . $category_data->name)
@include('frontend.body.header2')
<section class="section-padding">
    <div class="container">
        <div class="row">
    
            @if (count($blog_articles) > 0)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">

                    @foreach ($blog_articles as $articles)
                    <div class="col-lg-3 col-md-6">
                        <article class="post-grid mb-5">
                            <a class="post-thumb mb-4 d-block" href="{{ route('user.blog.show', ['blog' => $articles->slug]) }}">
                                <img src="{{ asset('media/' . $articles->thumbnail) }}" alt="" class="img-fluid w-100">
                            </a>
                            <span class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1"> {{
                                $category_list->firstWhere('id', $articles->category_id)->name }}</span>
                            <h3 class="post-title mt-1"><a href="{{ route('user.blog.show', ['blog' => $articles->slug]) }}">{{$articles->title}}</a></h3>

                            <span class="text-muted letter-spacing text-uppercase font-sm">{{
                                $articles->created_at->format('F j, Y') }}</span>

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
                        <li class="list-inline-item"><a href="{{ $url }}">{{ $page }}</a></li>
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
            @else
<h3>No Blog exist Under this Category</h3>

            @endif

        </div>
    </div>
</section>
@endsection