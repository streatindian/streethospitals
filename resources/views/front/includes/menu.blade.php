<div class="sticky">
    <div class="header-style horizontal-main clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <nav class="horizontalMenu clearfix d-md-flex">
                <ul class="horizontalMenu-list">
                    {!! init_menu() !!}
                    {{-- <li aria-haspopup="true">
                        <a class="active" href="#">Home <span class="fe fe-chevron-down"></span></a>
                        <ul class="sub-menu">
                            <li aria-haspopup="true"><a href="{{ url('/') }}">Home-Default</a></li>
                            <li aria-haspopup="true"><a href="index-text.html">Home Text</a></li>
                            <li aria-haspopup="true"><a href="index-slides.html">Home Slides</a></li>
                            <li aria-haspopup="true"><a href="index-video.html">Home Video</a></li>
                            <li aria-haspopup="true"><a href="index-animation.html">Home Animation</a></li>
                            <li aria-haspopup="true"><a href="index-map.html">Home Map</a></li>
                            <li aria-haspopup="true"><a href="index-intro-page.html">Home Intro Page</a></li>
                            <li aria-haspopup="true"><a href="index-popup-login.html">Home Pop-up login</a>
                            </li>
                            <li aria-haspopup="true"><a href="index-banner.html">Home Banner</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li aria-haspopup="true">
                        <a href="about.html">About Us</a>
                    </li> --}}

                </ul>
                <ul class="mb-0">
                    <li aria-haspopup="true" class="d-none d-lg-block ">
                        <span>
                            <a href="{{ route('provider.listing.index') }}" class="btn btn-danger btn-block mb-lg-0"><i
                                    class="fe fe-plus-circle mr-1 text-white"></i>Add Your Listing</a>
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
