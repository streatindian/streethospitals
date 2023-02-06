@extends('layouts.front-default')
@section('content')
    <!--Section-->
    @include('front.includes.banner',['category',$category])
    <!--/Section-->

    <!--Section-->
    @include('front.includes.category')
    <!--/Section-->

    <!--Section-->
    @include('front.includes.new-register')
    <!--Section-->

    <!--Section-->
    @include('front.includes.top-rated')
    <!--/Section-->

    <!--Statistics-->
    @include('front.includes.awards')
    <!--/Statistics-->

    <!--Section-->
    @include('front.includes.artical')
    <!--/Section-->

    <!--Section-->
    @include('front.includes.testimonial')
    <!--/Section-->

    <!--Section-->
    @include('front.includes.our-client')
    <!--/Section-->

    <!--Section-->
    @include('front.includes.related-location')
    <!--Section-->

    <!--Section-->
    @include('front.includes.post')
    <!--/Section-->

    <!--Section-->
    @include('front.includes.download-app')
    <!--/Section-->
@endsection
