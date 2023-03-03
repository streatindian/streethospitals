@extends('layouts.front-default')
@section('content')
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                <h4 class="page-title">Hospital List</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item"><a href="#">Hospitals</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hospital List</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <!--Add lists-->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class=" mb-lg-0">
                        <div class="">
                            <div class="item2-gl ">
                                <div class=" mb-0">
                                    <div class="">
                                        <div class="p-5 bg-white item2-gl-nav d-flex">
                                            <h6 class="mb-0 mt-2">Showing 1 to 10 of 30 entries</h6>
                                            <ul class="nav item2-gl-menu ml-auto">
                                                <li class="">
                                                    <a href="#tab-11" class="active show" data-toggle="tab"
                                                        title="List style"><i class="fa fa-list"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#tab-12" data-toggle="tab" class="" title="Grid"><i
                                                            class="fa fa-th"></i></a>
                                                </li>
                                            </ul>
                                            <div class="d-flex select2-sm">
                                                <label class="mr-2 mt-1 mb-sm-1">Sort By:</label>
                                                <select name="item" class="form-control select2">
                                                    <option value="1">Latest</option>
                                                    <option value="2">Oldest</option>
                                                    <option value="3">Price:Low-to-High</option>
                                                    <option value="5">Price:Hight-to-Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-11">
                                        @foreach ($listings as $listing)
                                            <div class="card overflow-hidden">
                                                <div class="d-md-flex">
                                                    <div class="item-card9-img">
                                                        <div class="item-card9-imgs"><a href="hospital-details.html"></a>
                                                            <div class="power-ribbon power-ribbon-top-left text-warning">
                                                                <span class="bg-warning"><i class="fa fa-bolt"></i></span>
                                                            </div>
                                                            <img alt="img" class="cover-image"
                                                                src="{{ asset('uploads/listing/' . $listing->profile_pic) }}">
                                                        </div>
                                                        <div class="item-card9-icons">
                                                            <a href="#" class="item-card9-icons1 item-icon-bg active"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="wishlist"><i
                                                                    class="fa fa fa-heart-o"></i></a>
                                                            <a href="#" class="item-card9-icons1 bg-purple"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Share"><i
                                                                    class="fa fa-share-alt"></i></a>
                                                        </div>
                                                        <div class="item-overly-trans">
                                                            <span class="badge badge-info">Hospital</span>
                                                            <div class="rating-stars d-flex">
                                                                <span class="text-white mr-1">4.3</span> <input
                                                                    class="rating-value star" name="rating-stars-value"
                                                                    readonly="readonly" type="number" value="4">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card border-0 mb-0">
                                                        <div class="card-body">
                                                            <div class="item-card9">
                                                                <a class="text-dark" href="hospital-details.html">
                                                                    <h4 class="font-weight-bold mt-1 mb-2">
                                                                        {{ ucwords($listing->name) }}<i
                                                                            class="ion-checkmark-circled  text-success fs-14 ml-1"></i>
                                                                    </h4>
                                                                </a>
                                                                <div class="item-card9-desc mb-2 mt-1">
                                                                    <span class="mr-4"><i
                                                                            class="fa fa-map-marker text-muted mr-1"></i>
                                                                        {{ $listing->CityDetail ? $listing->CityDetail->name : '' }}</span>
                                                                    <span class="mr-4"><i
                                                                            class="fe fe-briefcase text-muted mr-1"></i> 20
                                                                        Specialities</span>
                                                                    <span class="mr-4"><i
                                                                            class="fa fa-user-md text-muted mr-1"></i> 30
                                                                        Doctors</span>
                                                                    <span class="mr-4"><i
                                                                            class="fe fe-phone text-muted mr-1"></i>{{ $listing->phone }}</span>
                                                                </div>
                                                                <p class="mb-0 fs-14 mt-1"><span class=""><i
                                                                            class="fa fa-location-arrow text-muted mr-1"></i></span>
                                                                    {{ $listing->address }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer p-0">
                                                            <div class="item-card9-footer btn-appointment">
                                                                <div class="btn-group w-100">
                                                                    <a href="#"
                                                                        class="btn btn-outline-light w-34 p-2 border-top-0 border-right-0 border-bottom-0"><i
                                                                            class="fe fe-eye mr-1"></i>View Profile</a>
                                                                    <a href="#"
                                                                        class="btn btn-outline-light w-33 p-2 border-top-0 border-right-0 border-bottom-0"><i
                                                                            class="fa fa-user-md mr-1"></i>Doctorslist</a>
                                                                    <a
                                                                        class="btn btn-outline-light w-34 p-2 border-top-0 border-right-0 border-bottom-0 call-btn">
                                                                        <div class="call-btn-1">
                                                                            <i class="fe fe-phone mr-1"></i> Call
                                                                        </div>
                                                                        <div class="call-number">
                                                                            {{ $listing->phone }}
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="tab-pane" id="tab-12">
                                        <div class="row">
                                            @foreach ($listings as $listing)
                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                    <div class="card overflow-hidden">
                                                        <div class="item-card9-img">
                                                            <div class="item-card9-imgs">
                                                                <a href="hospital-details.html"></a>
                                                                <div
                                                                    class="power-ribbon power-ribbon-top-left text-warning">
                                                                    <span class="bg-warning"><i
                                                                            class="fa fa-bolt"></i></span>
                                                                </div>
                                                                <img alt="img" class="cover-image"
                                                                    src="{{ asset('uploads/listing/' . $listing->profile_pic) }}">
                                                            </div>
                                                            <div class="item-card9-icons">
                                                                <a href="#"
                                                                    class="item-card9-icons1 item-icon-bg active"
                                                                    data-toggle="tooltip" title=""
                                                                    data-original-title="wishlist"><i
                                                                        class="fa fa fa-heart-o"></i></a>
                                                                <a href="#" class="item-card9-icons1 bg-purple"
                                                                    data-toggle="tooltip" title=""
                                                                    data-original-title="Share"><i
                                                                        class="fa fa-share-alt"></i></a>
                                                            </div>
                                                            <div class="item-overly-trans">
                                                                <div class="rating-stars d-flex">
                                                                    <span class="text-white mr-1">4.3</span> <input
                                                                        class="rating-value star"
                                                                        name="rating-stars-value" readonly="readonly"
                                                                        type="number" value="4">
                                                                    <div class="rating-stars-container">
                                                                        <div class="rating-star sm ">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                        <div class="rating-star sm ">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                        <div class="rating-star sm ">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                        <div class="rating-star sm">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                        <div class="rating-star sm">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-overly-trans">
                                                                <span class="badge badge-info">Hospital</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="item-card9">
                                                                <a class="text-dark mt-2" href="hospital-details.html">
                                                                    <h4 class="font-weight-bold mb-1">
                                                                        {{ ucwords($listing->name) }}<i
                                                                            class="ion-checkmark-circled  text-success fs-14 ml-1"></i>
                                                                    </h4>
                                                                </a>
                                                                <span class="text-muted fs-13 mt-0"><i
                                                                        class="fa fa-location-arrow text-muted mr-2"></i>
                                                                    {{$listing->address}}</span>
                                                                <div class="mt-2 mb-0">
                                                                    <ul class="item-card-features mb-0">
                                                                        <li><span class=""><i
                                                                                    class="fa fa-map-marker mr-1 text-muted"></i>
                                                                                {{ $listing->CityDetail ? $listing->CityDetail->name : '' }}</span>
                                                                        </li>
                                                                        <li><span class=""><i
                                                                                    class="fe fe-briefcase mr-1 text-muted "></i>20
                                                                                Specialities</span></li>
                                                                        <li><span class=""><i
                                                                                    class="fa fa-user-md mr-1 text-muted"></i>
                                                                                30 Doctors</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer p-0 btn-appointment">
                                                            <div class="btn-group w-100">
                                                                <a class="w-50 btn btn-outline-light p-2 border-top-0 border-bottom-0 border-left-0 border-right-0"
                                                                    href="hospital-details.html"><i
                                                                        class="fe fe-eye mr-1"></i> Visit Website</a>
                                                                <a
                                                                    class="w-50 btn btn-outline-light p-2 border-top-0 border-bottom-0 border-right-0 call-btn">
                                                                    <div class="call-btn-1">
                                                                        <i class="fe fe-phone mr-1"></i> Call
                                                                    </div>
                                                                    <div class="call-number">
                                                                        {{ $listing->phone }}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="center-block text-center">
                                <ul class="pagination mb-lg-0 mb-5">
                                    <li class="page-item page-prev disabled">
                                        <a class="page-link" href="#" tabindex="-1">Prev</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item page-next">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Add lists-->
                <!--Right Side Content-->
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <div class="card-body">
                            <div class="" id="container">
                                <div class="filter-product-checkboxs">
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox1"
                                            value="option1">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Childrens hospitals<span
                                                    class="label label-light float-right">14</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox2"
                                            value="option2">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Womens Hospitals<span
                                                    class="label label-light float-right">22</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox3"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Gynic Hospitals<span
                                                    class="label label-light float-right">78</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox4"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Cardiac Hospitals<span
                                                    class="label label-light float-right">35</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox5"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Daignostic Centers<span
                                                    class="label label-light float-right">23</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox6"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Cancer Hospitals<span
                                                    class="label label-light float-right">14</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox7"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">ENT Hospitals<span
                                                    class="label label-light float-right">45</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox7"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Oncology Hospitals<span
                                                    class="label label-light float-right">34</span></span>
                                        </span>
                                    </label>
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox7"
                                            value="option3">
                                        <span class="custom-control-label">
                                            <span class="text-dark">Psychiatric Hospitals<span
                                                    class="label label-light float-right">12</span></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">Rating</h3>
                        </div>
                        <div class="card-body">
                            <select id="inputState" class="form-control nice-select">
                                <option>1 Star and higher</option>
                                <option>2 Star and higher</option>
                                <option>3 Star and higher</option>
                                <option>4 Star and higher</option>
                                <option>5 Star and higher</option>
                            </select>
                        </div>
                        <div class="card-header border-top">
                            <h3 class="card-title">Fees Range</h3>
                        </div>
                        <div class="card-body">
                            <h6>
                                <label for="price">Fees Range:</label>
                                <input type="text" id="price">
                            </h6>
                            <div id="mySlider"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block">Apply Filter</a>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Shares</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                <a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a>
                                <a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section>
    <!--/Section-->

    <!-- Newsletter-->
    <section class="sptb section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Newsletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 col-md-12">
                    <div class="input-group sub-input mt-1">
                        <input class="form-control input-lg" placeholder="Enter your Email" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-lg br-tr-3 br-br-3" type="button">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection