@extends('layouts.front-default')
@section('content')
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                <h4 class="page-title">Doctors Details</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item"><a href="#">Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctors Details</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body  item-user">
                            <div class="profile-pic mb-0">
                                <div class="d-md-flex">
                                    <img src=" {{ asset('uploads/listing/' . $doctor->profile_pic) }} "
                                        class="w-150 h-150 br-2" alt="user">
                                    <div class="ml-4">
                                        <a href="userprofile.html" class="text-dark">
                                            <h4 class="mt-3 mb-1 font-weight-bold">{{ ucwords($doctor->name) }} <i
                                                    class="ion-checkmark-circled  text-success fs-14 ml-1"></i></h4>
                                        </a>
                                        <span class="text-gray">{{ ucwords($doctor->specialization) }}</span><br>
                                        <span class="text-muted">Member Since November
                                            {{ date('Y', strtotime($doctor->created_at)) }}</span><br>
                                        <div class="rating-stars d-inline-flex mb-2 mr-3">
                                            <input type="number" readonly="readonly" class="rating-value star"
                                                name="rating-stars-value" value="4">
                                            <div class="rating-stars-container mr-2">
                                                <div class="rating-star sm "> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm "> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm "> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm "> <i class="fa fa-star"></i> </div>
                                                <div class="rating-star sm"> <i class="fa fa-star"></i> </div>
                                            </div>
                                            4.0
                                        </div>
                                        <div class="mt-2 mb-0">
                                            <a href="#" class="btn btn-secondary btn-sm">1245 Views</a>
                                            <a href="#" class="btn btn-info btn-sm">850 Patients</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-5" class="active"
                                                    data-toggle="tab">Description</a></li>
                                            <li><a href="#tab-6" data-toggle="tab" class="">Education</a></li>
                                            <li><a href="#tab-7" data-toggle="tab" class="">Consultation Fees</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-5">
                                        <div class="">
                                            {!! $doctor->about !!}
                                            {{-- <div class="mb-4">
                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                                    praesentium voluptatum deleniti atcorrupti quos dolores et quas
                                                    molestias excepturi sint occaecati cupiditate non provident, similique
                                                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et
                                                    dolorum fuga.</p>
                                                <p>On the other hand, we denounce with righteous indignation and dislike men
                                                    who are so beguiled and demoraliz the charms of pleasure of the moment,
                                                    so blinded by desire, that they cannot foresee the pain and trouble
                                                    thena bound to ensue; and equal blame belongs to those who fail in their
                                                    duty through weakness of will, which is the same as saying through
                                                    shrinking from toil and pain.</p>
                                            </div>
                                            <h4 class="mb-3 mt-4">Specifications</h4>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12">
                                                    <ul class="list-unstyled widget-spec mb-0">
                                                        <li class="">
                                                            <a href="#" class="text-dark"><i
                                                                    class="fa fa-caret-right mr-2"></i>Maternal-fetal
                                                                medicine</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#" class="text-dark"><i
                                                                    class="fa fa-caret-right mr-2"></i>Female pelvic
                                                                medicine and reconstructive surgery</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#" class="text-dark"><i
                                                                    class="fa fa-caret-right mr-2"></i>Reproductive
                                                                endocrinology and infertility</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#" class="text-dark"><i
                                                                    class="fa fa-caret-right mr-2"></i>Menopausal</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#" class="text-dark"><i
                                                                    class="fa fa-caret-right mr-2"></i>Laparoscopic
                                                                surgery</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-6">
                                        {{-- <div class="mb-4">
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                                praesentium voluptatum deleniti atcorrupti quos dolores et quas molestias
                                                excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                                                qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                            <p>On the other hand, we denounce with righteous indignation and dislike men who
                                                are so beguiled and demoraliz the charms of pleasure of the moment, so
                                                blinded by desire, that they cannot foresee the pain and trouble thena bound
                                                to ensue; and equal blame belongs to those who fail in their duty through
                                                weakness of will, which is the same as saying through shrinking from toil
                                                and pain.</p>
                                        </div> --}}
                                        {{-- <h4 class="mb-2 mt-4">Curriculum</h4> --}}
                                        {{-- <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <ul class="list-unstyled widget-spec mb-0">
                                                    <li class="">
                                                        <a href="#" class="text-dark"><i
                                                                class="fa fa fa-graduation-cap mr-2"></i>Pre Medical
                                                            College - M.D(Obstetrics & gynecology)</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="text-dark"><i
                                                                class="fa fa-graduation-cap  mr-2"></i>Wish Medical College
                                                            - M.S(Obstetrics & gynecology)</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                        {!! $doctor->degree !!}
                                    </div>
                                    <div class="tab-pane" id="tab-7">
                                        <div class="list-id">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered border-top mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Service Visit</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Maternal-fetal medicine</td>
                                                                    <td>$15</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Reproductive endocrinology and infertility</td>
                                                                    <td>$18</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Female pelvic medicine and reconstructive surgery
                                                                    </td>
                                                                    <td>$18</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Menopausal</td>
                                                                    <td>$21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Laparoscopic surgery</td>
                                                                    <td>$17</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pediatric and adolescent gynecology</td>
                                                                    <td>$15</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 pb-4 pl-5 pr-5 border-top border-top">
                            <div class="list-id">
                                <div class="row">
                                    <div class="col">
                                        <a class="mb-0">PublisherID : <span class="mb-0 font-weight-bold">#8256358
                                            </span> </a>
                                    </div>
                                    <div class="col col-auto">
                                        Posted By <a class="mb-0 font-weight-bold">Individual</a> / 21st Dec 2019
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-list">
                                <a href="#" class="btn btn-success icons"><i class="icon icon-note mr-1"></i> Book
                                    A Visit</a>
                                <a href="#" class="btn btn-danger icons" data-toggle="modal" data-target="#report"><i
                                        class="icon icon-exclamation mr-1"></i> Report Abuse</a>
                                <a href="#" class="btn btn-info icons"><i class="icon icon-share mr-1"></i> Share
                                    Ad</a>
                                <a href="#" class="btn btn-primary icons"><i class="icon icon-heart  mr-1"></i>
                                    678</a>
                                <a href="#" class="btn btn-secondary icons"><i class="icon icon-printer  mr-1"></i>
                                    Print</a>
                            </div>
                        </div>
                    </div>
                    <!--Comments-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rating And Reviews</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <p class="mb-2">
                                            <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i>5</span>
                                        </p>
                                        <div class="progress progress-md mb-4 h-4">
                                            <div class="progress-bar bg-success w-100">9,232</div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="mb-2">
                                            <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i>4</span>
                                        </p>
                                        <div class="progress progress-md mb-4 h-4">
                                            <div class="progress-bar bg-info w-80">8,125</div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="mb-2">
                                            <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 3</span>
                                        </p>
                                        <div class="progress progress-md mb-4 h-4">
                                            <div class="progress-bar bg-primary w-60">6,263</div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="mb-2">
                                            <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 2</span>
                                        </p>
                                        <div class="progress progress-md mb-4 h-4">
                                            <div class="progress-bar bg-secondary w-30">3,463</div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <p class="mb-2">
                                            <span class="fs-14 ml-2"><i class="fa fa-star text-yellow mr-2"></i> 1</span>
                                        </p>
                                        <div class="progress progress-md mb-4 h-4">
                                            <div class="progress-bar bg-orange w-20">1,456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="media mt-0 p-5">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object brround" alt="64x64"
                                            src="../assets/images/users/male/1.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-weight-semibold">Joanne Scott
                                        <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top"
                                            title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                        <span class="fs-14 ml-2"> 4.5 <i class="fa fa-star text-yellow"></i></span>
                                    </h5>
                                    <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st <i
                                            class=" ml-3 fa fa-clock-o"></i> 13.00 <i class=" ml-3 fa fa-map-marker"></i>
                                        Brezil</small>
                                    <p class="font-13  mb-2 mt-2">
                                        Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor
                                        sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                        incidunt ut labore et nostrud exercitation ullamco laboris commodo consequat.
                                    </p>
                                    <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                    <a href="" class="mr-2" data-toggle="modal"
                                        data-target="#Comment"><span>Comment</span></a>
                                    <a href="" class="mr-2" data-toggle="modal"
                                        data-target="#report"><span>Report</span></a>
                                    <div class="media mt-5">
                                        <div class="d-flex mr-3">
                                            <a href="#"> <img class="media-object brround" alt="64x64"
                                                    src="../assets/images/users/female/2.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-weight-semibold">Rose Slater <span
                                                    class="fs-14 ml-0" data-toggle="tooltip" data-placement="top"
                                                    title="verified"><i
                                                        class="fa fa-check-circle-o text-success"></i></span></h5>
                                            <small class="text-muted"><i class="fa fa-calendar"></i> Dec 22st <i
                                                    class=" ml-3 fa fa-clock-o"></i> 6.00 <i
                                                    class=" ml-3 fa fa-map-marker"></i> Brezil</small>
                                            <p class="font-13  mb-2 mt-2">
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris commodo
                                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur consequat.
                                            </p>
                                            <a href="" data-toggle="modal" data-target="#Comment"><span
                                                    class="badge badge-default">Comment</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media p-5 border-top mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"> <img class="media-object brround" alt="64x64"
                                            src="../assets/images/users/male/3.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-weight-semibold">Edward
                                        <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top"
                                            title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                        <span class="fs-14 ml-2"> 4 <i class="fa fa-star text-yellow"></i></span>
                                    </h5>
                                    <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st <i
                                            class=" ml-3 fa fa-clock-o"></i> 16.35 <i class=" ml-3 fa fa-map-marker"></i>
                                        UK</small>
                                    <p class="font-13  mb-2 mt-2">
                                        Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor
                                        sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                        incidunt ut labore et nostrud exercitation ullamco laboris commodo consequat.
                                    </p>
                                    <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                    <a href="" class="mr-2" data-toggle="modal"
                                        data-target="#Comment"><span>Comment</span></a>
                                    <a href="" class="mr-2" data-toggle="modal"
                                        data-target="#report"><span>Report</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Comments-->
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h3 class="card-title">Leave a reply</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name1" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Comment"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary">Send Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Book a Visit</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Age</label>
                                <input type="text" class="form-control" placeholder="Enter your age">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" placeholder="Enter your Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fix Appointemnt Date</label>
                                <input class="form-control fc-datepicker" placeholder="Appointment Date" type="text">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Time</label>
                                <div class="row gutters-xs">
                                    <div class="col-6">
                                        <select name="user[hour]" class="form-control select2">
                                            <option value="">0</option>
                                            <option value="0">1</option>
                                            <option value="1">2</option>
                                            <option value="2">3</option>
                                            <option value="3">4</option>
                                            <option value="4">5</option>
                                            <option value="5">6</option>
                                            <option selected="selected" value="6">7</option>
                                            <option value="7">8</option>
                                            <option value="8">9</option>
                                            <option value="9">10</option>
                                            <option value="10">11</option>
                                            <option value="11">12</option>
                                            <option value="12">13</option>
                                            <option value="13">14</option>
                                            <option value="14">15</option>
                                            <option value="15">16</option>
                                            <option value="16">17</option>
                                            <option value="17">18</option>
                                            <option value="18">19</option>
                                            <option value="19">20</option>
                                            <option value="20">21</option>
                                            <option value="21">22</option>
                                            <option value="22">23</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select name="user[minute]" class="form-control select2">
                                            <option value="">Minutes</option>
                                            <option value="0">00</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option selected="selected" value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="country" id="select-countries"
                                    class="form-control custom-select select2-show-search">
                                    <option value="0" selected> All Categories</option>
                                    <option value="1"> Out Patient</option>
                                    <option value="11"> General Checkup</option>
                                    <option value="2"> Maternal-fetal medicine</option>
                                    <option value="3"> Reproductive endocrinology and infertility</option>
                                    <option value="4"> Female pelvic medicine and reconstructive surgery</option>
                                    <option value="5"> Menopausal</option>
                                    <option value="6"> Laparoscopic surgery</option>
                                    <option value="7"> Pediatric and adolescent gynecology</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <a href="#" class="btn  btn-primary">Fix Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Section-->

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
