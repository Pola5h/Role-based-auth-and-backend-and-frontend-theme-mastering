@extends('frontend.master')
@section('frontend')
@section('title', 'My Profile')
@include('frontend.body.header2')

<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h2 class="lg-title">Profile</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">



            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar sidebar-right">
                    <div class="sidebar-wrap mt-5 mt-lg-0">
                        <div class="sidebar-widget about mb-5 text-center p-3">
                            <div class="about-author">
                                <img src="{{ URL::asset('../frontend/assets/images/author.jpg')}}" alt=""
                                    class="img-fluid">
                            </div>
                            <h4 class="mb-0 mt-4">{{ $userData->name }}</h4>
                            <h5>{{ $userData->email }}</h5>
                            <h5>Joined: {{ $userData->created_at->format('d M Y') }}</h5>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection