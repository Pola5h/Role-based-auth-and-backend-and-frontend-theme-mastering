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
                            @foreach(explode('|', $blogData->tags) as $tag)
                            <a href="#">{{ '#' . ucfirst(trim($tag)) }}</a>
                            @endforeach

                        </div>

                        <div
                            class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">

                            <span class="single-comment-o"><i class="fa fa-comment-o"></i>0 comment</span>

                            <div class="post-share">
                                <a class="penci-post-like single-like-button" data-post-id="{{ $blogData->id }}">
                                    <i class="ti-heart"></i> like
                                </a>
                                <span class="count-number-like" id="like-count">0</span>
                            </div>

                            <div class="list-posts-share">
                                <a target="_blank" rel="nofollow" href="{{ $link['facebook'] }}"><i
                                        class="ti-facebook"></i></a>
                                <a target="_blank" rel="nofollow" href="{{ $link['twitter'] }}"><i
                                        class="ti-twitter"></i></a>
                                <a target="_blank" rel="nofollow" href="{{ $link['linkedin'] }}"><i
                                        class="ti-linkedin"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-author d-flex my-5">
                    <div class="author-img">
                        <img alt="" src="{{ asset('images/' . $userData->image) }}" class="avatar avatar-100 photo"
                            width="100" height="100">
                    </div>

                    <div class="author-content pl-4">
                        <h4 class="mb-3"><a href="#" title="" rel="author" class="text-capitalize">{{ $userData->name
                                }}</a>
                        </h4>
                        <p>{{ $userData->about }}</p>

                        @foreach ($userSocialMedia as $username)
                        @if ($username->facebook)
                        <a target="_blank" class="author-social"
                            href="https://www.facebook.com/{{ $username->facebook }}/"><i class="ti-facebook"></i></a>
                        @endif
                        @if ($username->twitter)
                        <a target="_blank" class="author-social"
                            href="https://www.twitter.com/{{ $username->twitter }}/"><i class="ti-twitter"></i></a>
                        @endif

                        @if ($username->instagram)
                        <a target="_blank" class="author-social"
                            href="https://www.instagram.com/{{ $username->instagram }}/"><i
                                class="ti-instagram"></i></a>
                        @endif

                        @if ($username->youtube)
                        <a target="_blank" class="author-social"
                            href="https://www.youtube.com/{{ $username->youtube }}/"><i class="ti-youtube"></i></a>
                        @endif
                        @endforeach

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

                <div class="comment-area my-5">
                    <h3 class="mb-4 text-center">Comments</h3>

                    <script>
                        var mediaUrl = "{{ asset('images/') }}";
                        setInterval(function() {
                            $.ajax({
                                type: 'GET',
                                url: '/comment/' + '{{ $blogData->id }}',
                                success: function(data) {
                                    $('.comment-area').empty();
                                    data.comments.forEach(function(comment) {
                                        var commentHtml = `

                                            <div class="comment-area-box media">
                                                <img alt=""width="60" height="60" src="${mediaUrl}/${comment.image}" class="img-fluid float-left mr-3 mt-2">
                                                <div class="media-body ml-4">
                                                    <h4 class="mb-0">${comment.user}</h4>
                                                    <span class="date-comm font-sm text-capitalize text-color"><i class="ti-time mr-2"></i>${comment.date}</span>
                                                    <div class="comment-content mt-3">
                                                        <p>${comment.content}</p>
                                                    </div>
                                                    <div class="comment-meta mt-4 mt-lg-0 mt-md-0">
                                </div>

                            
                                               
                                                </div>
                                            </div>`;
                                        $('.comment-area').append(commentHtml);
                                    });
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                }
                            });
                        }, 500); 
                    </script>


                </div>
                @auth

                <form class="comment-form mb-5 gray-bg p-5" id="comment-form" method="POST"> @csrf
                    <!-- Add this line to include the CSRF token -->

                    <h3 class="mb-4 text-center">Leave a comment</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                placeholder="Comment"></textarea>
                        </div>

                    </div>

                    <input class="btn btn-primary" type="submit" name="submit-contact" id="submit_contact"
                        action="/comment" value="Comment">
                </form>
                @else

                <form class="comment-form mb-5 gray-bg p-5" id="comment-form" method="POST"> @csrf
                    <!-- Add this line to include the CSRF token -->

                    <h1 class="mb-4 text-center">Leave a comment</h1>
                    <h4 class="mb-4 text-center">You need to login first</h4>



                </form>
                @endauth

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

                                @foreach ($userSocialMedia as $username)
                                @if ($username->facebook)
                                <a href="https://www.facebook.com/{{ $username->facebook }}/"><i
                                        class="ti-facebook"></i></a>
                                @endif
                                @if ($username->twitter)
                                <a href="https://www.twitter.com/{{ $username->twitter }}/"><i
                                        class="ti-twitter"></i></a>
                                @endif
                                @if ($username->instagram)
                                <a href="https://www.instagram.com/{{ $username->instagram }}/"><i
                                        class="ti-instagram"></i></a>
                                @endif
                                @if ($username->youtube)
                                <a href="https://www.youtube.com/{{ $username->youtube }}/"><i
                                        class="ti-youtube"></i></a>
                                @endif
                                @endforeach

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

                        <?php  $categoryData = App\Models\Category::paginate(5);  ?>

                        <div class="sidebar-widget category mb-5">
                            <h4 class="text-center widget-title">Categories</h4>
                            <ul class="list-unstyled" id="category-list">
                                <!-- Initial categories are loaded here -->
                                @foreach($categoryData->take(5) as $category)
                                <li class="align-items-center d-flex justify-content-between">
                                    <a href="{{ route('category.blog', ['slug' => $category->slug]) }}">{{
                                        $category->name }}</a>
                                    <span>{{ $countBlog = App\Models\Blog::where('category_id', $category->id)->count();
                                        }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <button id="load-more-btn" data-page="2"
                                style="background-color: #CE8460; color: white; display: block; margin: 0 auto; border: none;">Load
                                More</button>

                        </div>

                        <div class="sidebar-widget subscribe mb-5">
                            <h4 class="text-center widget-title">Newsletter</h4>
                            <form action="/newsletter/subscribe" method="post">
                                @csrf
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                                <button type="submit" class="btn btn-primary d-block mt-3">Sign Up</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- script for count like --}}
<script>
    $(document).ready(function(){
        $(document).on('click', '.single-like-button', function(){
            var postId = $(this).attr('data-post-id');
            var likeButton = $(this);
            var likeCount = $(this).siblings('.count-number-like');
            
            @auth
                // User is authenticated, proceed with the like logic
                $.ajax({
                    url: '/like',
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        post_id: postId
                    },
                    success: function(response){
                        if (response.status === 'liked') {
                            var currentCount = parseInt(likeCount.text());
                            likeCount.text(currentCount + 1);
                            likeButton.find('i').removeClass('ti-heart-broken').addClass('ti-heart');
                        } else if (response.status === 'unliked') {
                            var currentCount = parseInt(likeCount.text());
                            likeCount.text(currentCount - 1);
                            likeButton.find('i').removeClass('ti-heart').addClass('ti-heart-broken');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error: " + error);
                        toast('Error: ' + error, 'error');
                    }
                });
            @else
                // User is not authenticated, show the "Please log in" SweetAlert2 popup
                Swal.fire({
                    title: 'Please log in',
                    text: 'You must be logged in to like this post.',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'OK'
                });
            @endauth
        });
    });
</script>
{{-- script for show like stat --}}

<script>
    $(document).ready(function () {
    var blogId = {{ $blogData->id }};

    $.get('/get-like-count/' + blogId, function (data) {
        console.log('data.like_count:', data.like_count);
        $('#like-count').text(data.like_count);

        if (data.user_liked) {
            $('.single-like-button i').removeClass('ti-heart-broken').addClass('ti-heart');
        } else {
            $('.single-like-button i').removeClass('ti-heart').addClass('ti-heart-broken');
        }
    });
});

</script>
{{-- for category pagenation --}}
<script type="text/javascript">
    $(document).ready(function() {
    var page = 2; // Initial page number

    $('#load-more-btn').click(function() {
        $.ajax({
            url: '/load-more-categories?page=' + page, // Replace with your route for loading more categories
            type: 'GET',
            success: function(data) {
                if (data.categories.length > 0) {
                    // Append the loaded categories to the list
                    data.categories.forEach(function(category) {
                        var categoryItem = '<li class="align-items-center d-flex justify-content-between">' +
                            '<a href="' + category.url + '">' + category.name + '</a>' +
                            '<span>' + category.count + '</span>' +
                            '</li>';
                        $('#category-list').append(categoryItem);
                    });

                    page++; // Increment the page number
                } else {
                    // No more categories to load, hide the "Load More" button
                    $('#load-more-btn').hide();
                }
            }
        });
    });
});

</script>

{{-- comment --}}
<script>
    $(document).ready(function() {
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();
        var comment = $('#comment').val();
        $.ajax({
            type: 'POST',
            url: '/comment',
            data: {
                _token: $('input[name="_token"]').val(),
                blog_id: '{{ $blogData->id }}',
                comment: comment,
            },
            success: function(response) {
                // You can handle success here
                console.log(response);
                
                // Clear the textarea after a successful comment submission
                $('#comment').val('');
            },
            error: function(response) {
                // You can handle error here
                console.log(response);
            }
        });
    });
});


</script>

@endsection