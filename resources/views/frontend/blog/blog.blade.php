@extends('frontend.master')
@section('frontend')
@section('title', $blogData->title)
@include('frontend.body.header2')



<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                <div class="single-post">
                    <div class="post-header mb-5 text-center">
                        <div class="meta-cat">
                            <a class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                href="#">{{ $categoryName }}</a>

                        </div>
                        <h2 class="post-title mt-2">
                            {{ $blogData->title }}
                        </h2>

                        <div class="post-meta">
                            <span class="text-uppercase font-sm letter-spacing-1 mr-3">by {{ $userData->name }}</span>
                            <span class="text-uppercase font-sm letter-spacing-1">{{ $blogData->created_at->format('F d,
                                Y') }}
                            </span>
                        </div>
                        <div class="post-featured-image mt-5">
                            <img src="{{ asset('media/' . $blogData->banner) }}" class="img-fluid w-100"
                                alt="featured-image">
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="entry-content">

                            {!! $blogData->content !!}

                        </div>

                        <div class="post-tags py-4">
                            <a href="#">#Health</a>
                            <a href="#">#Game</a>
                            <a href="#">#Tour</a>
                        </div>


                        <div
                            class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">

                            <span class="single-comment-o"><i class="fa fa-comment-o"></i>0 comment</span>

                            <div class="post-share">
                                <span class="count-number-like">2</span>
                                <a class="penci-post-like single-like-button"><i class="ti-heart"></i></a>
                            </div>

                            <div class="list-posts-share">
                                <a target="_blank" rel="nofollow" href="#"><i class="ti-facebook"></i></a>
                                <a target="_blank" rel="nofollow" href="#"><i class="ti-twitter"></i></a>
                                <a target="_blank" rel="nofollow" href="#"><i class="ti-pinterest"></i></a>
                                <a target="_blank" rel="nofollow" href="#"><i class="ti-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-author d-flex my-5">
                    <div class="author-img">
                        <img alt="" src="images/author.jpg" class="avatar avatar-100 photo" width="100" height="100">
                    </div>

                    <div class="author-content pl-4">
                        <h4 class="mb-3"><a href="#" title="" rel="author" class="text-capitalize">Themefisher</a>
                        </h4>
                        <p>Hey there. My name is Liam. I was born with the love for traveling. I also love taking
                            photos with my phone in order to capture moment..</p>

                        <a target="_blank" class="author-social" href="#"><i class="ti-facebook"></i></a>
                        <a target="_blank" class="author-social" href="#"><i class="ti-twitter"></i></a>
                        <a target="_blank" class="author-social" href="#"><i class="ti-google-plus"></i></a>
                        <a target="_blank" class="author-social" href="#"><i class="ti-instagram"></i></a>
                        <a target="_blank" class="author-social" href="#"><i class="ti-pinterest"></i></a>
                        <a target="_blank" class="author-social" href="#"><i class="ti-tumblr"></i></a>
                    </div>
                </div>
                <nav class="post-pagination clearfix border-top border-bottom py-4">
                    <div class="prev-post">
                        @if ($previousPost)
                        <a href="{{ route('user.blog.show', $previousPost->slug) }}">
                            <span class="text-uppercase font-sm letter-spacing">Previous</span>
                            <h4 class="mt-3">{{ $previousPost->title }}</h4>
                        </a>
                        @endif
                    </div>
                    <div class="next-post">
                        @if ($nextPost)
                        <a href="{{ route('user.blog.show', $nextPost->slug) }}">
                            <span class="text-uppercase font-sm letter-spacing">Next</span>
                            <h4 class="mt-3">{{ $nextPost->title }}</h4>
                        </a>
                        @endif
                    </div>
                </nav>

                <div class="related-posts-block mt-5">
                    <h3 class="news-title mb-4 text-center">You May Also Like</h3>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="post-block-wrapper mb-4 mb-lg-0">
                                <a href="{{ route('user.blog.show', $relatedPost->slug) }}">
                                    <img class="img-fluid" src="  {{ asset('media/' . $relatedPost->thumbnail) }}"
                                        alt="post-thumbnail" />
                                </a>
                                <div class="post-content mt-3">
                                    <h5>
                                        <a href="{{ route('user.blog.show', $relatedPost->slug) }}">{{
                                            $relatedPost->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar sidebar-right">
                    <div class="sidebar-wrap mt-5 mt-lg-0">
                        <div class="sidebar-widget about mb-5 text-center p-3">
                            <div class="about-author">
                                <img src="{{ asset('images/' . $userData->image) }}" alt="" class="img-fluid">
                            </div>
                            <h4 class="mb-0 mt-4">{{ $userData->name }}</h4>
                            <h5>{{ $userData->email }}</h5>
                            <h6>Joined: {{ $userData->created_at->format('d M Y') }}</h6>
                            <p>{{ $userData->about }}</p>
                        </div>
                        <div class="sidebar-widget follow mb-5 text-center">
                            <h4 class="text-center widget-title">Follow Me</h4>
                            <div class="follow-socials">


                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-instagram"></i></a>
                                <a href="#"><i class="ti-youtube"></i></a>
                                <a href="#"><i class="ti-pinterest"></i></a>
                            </div>
                        </div>

                        <div class="sidebar-widget mb-5">
                            <h4 class="text-center widget-title">Trending Posts</h4>

                            <!-- Loop through the related posts -->
                            @php
                            $count = 0;
                            @endphp

                            @foreach($trendingPosts as $post)
                            @if($count == 0)
                            <div class="sidebar-post-item-big">
                                <a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}"><img
                                        src="{{ asset('media/' . $post->thumbnail) }}" alt="" class="img-fluid"></a>
                                <div class="mt-3 media-body">
                                    <span class="text-muted letter-spacing text-uppercase font-sm">{{
                                        $post->created_at->format('F j, Y') }}</span>
                                    <h4><a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}">{{ $post->title
                                            }}</a></h4>
                                </div>
                            </div>
                            @elseif($count == 1)
                            <div class="media border-bottom py-3 sidebar-post-item">
                                <a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}"><img
                                        src="{{ asset('media/' . $post->thumbnail) }}" alt="" class="mr-4"></a>
                                <div class="media-body">
                                    <span class="text-muted letter-spacing text-uppercase font-sm">{{
                                        $post->created_at->format('F j, Y') }}</span>
                                    <h4><a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}">{{ $post->title
                                            }}</a></h4>
                                </div>
                            </div>
                            @else
                            <div class="media py-3 sidebar-post-item">
                                <a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}"><img
                                        src="{{ asset('media/' . $post->thumbnail) }}" alt="" class="mr-4"></a>
                                <div class="media-body">
                                    <span class="text-muted letter-spacing text-uppercase font-sm">{{
                                        $post->created_at->format('F j, Y') }}</span>
                                    <h4><a href="{{ route('user.blog.show', ['blog' => $post->slug]) }}">{{ $post->title
                                            }}</a></h4>
                                </div>
                            </div>
                            @endif
                            @php
                            $count++;
                            @endphp
                            @endforeach


                        </div>

                        <?php
                        $categoryData = App\Models\Category::paginate(10); // Assuming 10 categories per page
                        ?>
                        <div class="sidebar-widget category mb-5">
                            <h4 class="text-center widget-title">Categories</h4>
                            <ul class="list-unstyled">
                                @foreach($categoryData as $category)
                                    <li class="align-items-center d-flex justify-content-between">
                                        <a href="">{{ $category->name }}</a>
                                        <span></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        {{ $categoryData->links('ajax') }}
                        

                        <div class="sidebar-widget subscribe mb-5">
                            <h4 class="text-center widget-title">Newsletter</h4>
                            <input type="text" class="form-control" placeholder="Email Address">
                            <a href="#" class="btn btn-primary d-block mt-3">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.pagination a').click(function(event) {
            event.preventDefault();
    
            var page = $(this).attr('href');
    
            $.ajax({
                url: page,
                success: function(data) {
                    $('#categoryData').html(data);
                }
            });
        });
    });
    </script>
    
@endsection