@extends('layouts.front-default')
@section('content')
    <section class="sptb mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Dashboard</h3>
                        </div>
                        <div class="card-body text-center item-user">
                            <div class="profile-pic">
                                <div class="profile-pic-img">
                                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top"
                                        title="online"></span>
                                    <img src="../assets/images/users/female/17.jpg" class="brround" alt="user">
                                </div>
                                <a href="userprofile.html" class="text-dark">
                                    <h4 class="mt-3 mb-0 font-weight-semibold">{{auth()->user()->name}}</h4>
                                </a>
                            </div>
                        </div>
                        <aside class="app-sidebar doc-sidebar my-dash">
                            <div class="app-sidebar__user clearfix">
                                <ul class="side-menu">
                                    <li>
                                        <a class="side-menu__item" href="mydash.html"><i class="icon icon-user"></i><span
                                                class="side-menu__label ml-2">Edit Profile</span></a>
                                    </li>
                                    {{-- <li>
                                        <a class="side-menu__item" href="myads.html"><i class="icon icon-diamond"></i><span
                                                class="side-menu__label ml-2">My Ads</span></a>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                                class="icon icon-heart"></i><span class="side-menu__label ml-2">My
                                                Favorite</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a class="slide-item" href="myfavorite.html"><i
                                                        class="fa fa-angle-right mr-2"></i>Favorite1</a></li>
                                            <li><a class="slide-item" href="#"><i
                                                        class="fa fa-angle-right mr-2"></i>Favorite2</a></li>
                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                                class="icon icon-folder-alt"></i><span class="side-menu__label ml-2">Managed
                                                Ads</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                            <li><a class="slide-item" href="manged.html"><i
                                                        class="fa fa-angle-right mr-2"></i></i>Managed Ads 01</a></li>
                                            <li><a class="slide-item" href="#"><i
                                                        class="fa fa-angle-right mr-2"></i></i>Managed Ads 02</a></li>
                                            <li class="sub-slide">
                                                <a class="side-menu__item border-top-0 slide-item"
                                                    data-toggle="sub-slide"><span class="side-menu__label"><i
                                                            class="fa fa-angle-right mr-2"></i>Ads</span> <i
                                                        class="sub-angle fa fa-angle-right"></i></a>
                                                <ul class="child-sub-menu ">
                                                    <li><a class="slide-item" href="#"><i
                                                                class="fa fa-angle-right mr-2 text-muted"></i>Managed Ads
                                                        </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="payments.html"><i
                                                class="icon icon-credit-card"></i><span
                                                class="side-menu__label ml-2">Payments</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="orders.html"><i class="icon icon-basket"></i><span
                                                class="side-menu__label ml-2">Orders</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="tips.html"><i
                                                class="icon icon-game-controller"></i><span
                                                class="side-menu__label ml-2">Safety Tips</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="settings.html"><i
                                                class="icon icon-settings"></i><span class="side-menu__label ml-2">Settings
                                            </span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="login.html"><i class="icon icon-power"></i><span
                                                class="side-menu__label ml-2">Logout</span></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </aside>
                    </div>
                    {{-- <div class="card my-select">
                        <div class="card-header">
                            <h3 class="card-title">Search Ads</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="text"
                                    placeholder="What are you looking for?">
                            </div>
                            <div class="form-group">
                                <select name="country" id="select-countries"
                                    class="form-control custom-select select2-show-search">
                                    <option value="1" selected="">All Categories</option>
                                    <option value="2">Hospitals</option>
                                    <option value="3">Doctors</option>
                                    <option value="4">FitnessCenter</option>
                                    <option value="5">Vehicles</option>
                                    <option value="6">Pharmacy</option>
                                    <option value="7">Clinics</option>
                                    <option value="8">Booldbank</option>
                                </select>
                            </div>
                            <div class="">
                                <a href="#" class="btn  btn-primary">Search</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="Vehicle Address">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Postal Code</label>
                                        <input type="number" class="form-control" placeholder="ZIP Code">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Country</label>
                                        <select
                                            class="form-control select2-show-search border-bottom-0 w-100 select2-show-search"
                                            data-placeholder="Select">
                                            <optgroup label="Categories">
                                                <option>--Select--</option>
                                                <option value="1">Germany</option>
                                                <option value="2">Mercedes-Suzuki Swift</option>
                                                <option value="3">Canada</option>
                                                <option value="4">Usa</option>
                                                <option value="5">Afghanistan</option>
                                                <option value="6">Albania</option>
                                                <option value="7">China</option>
                                                <option value="8">Denmark</option>
                                                <option value="9">Finland</option>
                                                <option value="10">India</option>
                                                <option value="11">Kiribati</option>
                                                <option value="12">Kuwait</option>
                                                <option value="13">Mexico</option>
                                                <option value="14">Pakistan</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.facebook.com/">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Google</label>
                                        <input type="text" class="form-control" placeholder="https://www.google.com/">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Twitter</label>
                                        <input type="text" class="form-control" placeholder="https://twitter.com/">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Pinterest</label>
                                        <input type="text" class="form-control"
                                            placeholder="https://in.pinterest.com/">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">About Me</label>
                                        <textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Upload Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                name="example-file-input-custom">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary">Updated Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
