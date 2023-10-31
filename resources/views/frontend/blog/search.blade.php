@extends('frontend.master')
@section('frontend')
@section('title', count($results) . ' found of ' . $query)
@include('frontend.body.header2')
<section class="section-padding pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                @if(count($results) > 0)

                <h4>Great! {{ count($results) }} Blog{{ count($results) != 1 ? 's' : '' }} Found!</h4>


                
@foreach ($results as $result )


<div class="mb-4 post-list border-bottom pb-4">
    <div class="row no-gutters">
        {{-- <div class="col-md-5">
            <a class="post-thumb " href="{{ route('user.blog.show', ['blog' => $result->slug]) }}">
                <img src="{{ asset('media/' . $result->thumbnail) }}" alt="" class="img-fluid w-10">
            </a>
        </div> --}}

        <div class="col-md-7">
            <div class="post-article mt-sm-3">
                <div class="meta-cat">
                    <span
                        class="letter-spacing cat-name font-extra text-uppercase font-sm">{{ App\Models\Category::firstWhere('id', $result->category_id)->name }}</span>
                </div>
                <h3 class="post-title mt-2"><a href="{{ route('user.blog.show', ['blog' => $result->slug]) }}">{{ $result->title }}</a></h3>

                <div class="post-meta">
                    <ul class="list-inline">
                        <li class="post-like list-inline-item">
                            <span class="font-sm letter-spacing-1 text-uppercase"><i
                                    class="ti-time mr-2"></i>{{ $result->created_at->format('d M Y') }}</span>
                        </li>
                        <li class="post-view list-inline-item letter-spacing-1">{{ $result->visits_count }} views</li>
                    </ul>
                </div>

                @php
                $content = $result->content;
                $pattern = '/<p>(.*?)<\/p>/s'; // Use the /s modifier to match across line breaks
                $matches = [];
            
                if (preg_match_all($pattern, $content, $matches)) {
                    $combinedContent = implode(' ', $matches[1]);
                    $truncatedContent = Str::limit(strip_tags($combinedContent), 100, ' ...');
                } else {
                    $truncatedContent = Str::limit(strip_tags($content), 100, ' ...');
                }
            @endphp
                <div class="post-content">
                    <p>{!! $truncatedContent !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else

  <div class="mb-4 pb-4">
                    <div class="row no-gutters">
                        <h4>No data found, Please, search again!</h4>
                    </div>
             
                </div>
              
@endif

               
            </div>

        </div>
    </div>
</section>
@endsection