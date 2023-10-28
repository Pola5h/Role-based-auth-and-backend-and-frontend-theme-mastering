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
                            <img src="{{ asset('media/' . $blogData->thumbnail) }}" class="img-fluid w-100"
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

                        <div class="sidebar-widget mb-5 ">
                            <h4 class="text-center widget-title">Trending Posts</h4>
                    
                            <div class="sidebar-post-item-big">
                                <a href="blog-single.html"><img src="images/news/img-1.jpg" alt="" class="img-fluid"></a>
                                <div class="mt-3 media-body">
                                    <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                    <h4 ><a href="blog-single.html">Meeting With Clarissa, Founder Of Purple Conversation App</a></h4>
                                </div>
                            </div>
                    
                            <div class="media border-bottom py-3 sidebar-post-item">
                                <a href="#"><img class="mr-4" src="images/news/thumb-1.jpg" alt=""></a>
                                <div class="media-body">
                                    <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                    <h4 ><a href="blog-single.html">Thoughtful living in los Angeles</a></h4>
                                </div>
                            </div>
                    
                            <div class="media py-3 sidebar-post-item">
                                <a href="#"><img class="mr-4" src="images/news/thumb-2.jpg" alt=""></a>
                               <div class="media-body">
                                       <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                    <h4 ><a href="blog-single.html">Vivamus molestie gravida turpis.</a></h4>
                                </div>
                            </div>
                        </div>
                        	<div class="sidebar-widget category mb-5">
		<h4 class="text-center widget-title">Catgeories</h4>
	 	<ul class="list-unstyled">
		  <li class="align-items-center d-flex justify-content-between">
		    <a href="#">Innovation</a>
		    <span>14</span>
		  </li>
		  <li class="align-items-center d-flex justify-content-between">
		    <a href="#">Software</a>
		    <span>2</span>
		  </li>
		  <li class="align-items-center d-flex justify-content-between">
		    <a href="#">Social</a>
		    <span>10</span>
		  </li>
		  <li class="align-items-center d-flex justify-content-between">
		    <a href="#">Trends</a>
		    <span>5</span>
		  </li>
		</ul>
	</div>
	
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

@endsection