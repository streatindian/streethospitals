@extends('layouts.front-default')
@section('content')
    <style>
        .typeahead {
            width: 100%;
        }

        .typeahead li {
            border-bottom: 2px solid lightgray;
        }

        li:last-child {
            border-bottom: none;
        }
    </style>
    <!--Section-->
    @include('front.includes.banner', ['category', $category])
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
@section('js')
    <script src="{{ asset('assets/js/typeahead.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var route = "{{ url('search-listing') }}";
        $('#search').typeahead({
            source: function(query, process) {
                // console.log($(this)[0].$element);
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
