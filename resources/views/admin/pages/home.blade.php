@extends('layouts.admin.default')
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Dashboard 04</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 04</li>
            </ol>
        </div>



        <div class="row item-all-cat">
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-purple text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/mail.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Emails</p>
                        <h1 class="mb-0 counter">245</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-lime text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/megaphone.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Ads</p>
                        <h1 class="mb-0 counter">3,892</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-pink text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/blogging.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Comments</p>
                        <h1 class="mb-0 counter">763</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-orange text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/picture.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Medias</p>
                        <h1 class="mb-0 counter">5,925</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-blue text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/customer.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Services</p>
                        <h1 class="mb-0 counter">653</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="item-all-card bg-yellow text-center">
                    <a href="#"></a>
                    <div class="iteam-all-icon">
                        <img src="{{asset('assets/images/svg/box-closed.svg')}}" alt="email" class="w-30">
                    </div>
                    <div class="item-all-text mt-3">
                        <p>Total Add Packs</p>
                        <h1 class="mb-0 counter">836</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dailywise Growth</h3>
                    </div>
                    <div class="card-body">
                        <div id="echart1" class="chartmorris overflow-hidden"></div>
                        <div class="text-center mt-3">
                            <span class="dot-label bg-primary"></span><span class="mr-3">Profit</span>
                            <span class="dot-label bg-warning"></span><span>Growth</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Latest Ads</div>
                    </div>
                    <div class="card-body">
                        <div class="item3-medias">
                            <div class="media meida-md mt-0 pb-2">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object mr-2 br-2"
                                            src="{{asset('assets/images/media/19.jpg')}}" alt="media1"> </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading font-weight-bold text-uppercase">Hospitals
                                    </h6>
                                    <ul class="mb-0 item3-lists d-flex">
                                        <li> <a href=""><i class="icon icon-user"></i> Gavin</a>
                                        </li>
                                        <li> <a href=""><i class="icon icon-location-pin"></i>
                                                UK</a> </li>
                                        <li> <a href=""><i class="icon icon-calendar"></i> Nov
                                                22</a> </li>
                                    </ul>
                                    <h5 class="font-weight-semibold  mb-0 mt-2 text-muted">when an unknown
                                        printer galle</h5>
                                </div>
                            </div>
                            <div class="media meida-md pb-2">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object mr-2 br-2"
                                            src="{{asset('assets/images/media/21.jpg')}}" alt="media1"> </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading  font-weight-bold text-uppercase">Doctors</h6>
                                    <ul class="mb-0 item3-lists d-flex">
                                        <li> <a href=""><i class="icon icon-user"></i> Gavin</a>
                                        </li>
                                        <li> <a href=""><i class="icon icon-location-pin"></i>
                                                USA</a> </li>
                                        <li> <a href=""><i class="icon icon-calendar"></i> Nov
                                                28</a> </li>
                                    </ul>
                                    <h5 class="font-weight-semibold mb-0 mt-2 text-muted">structures, to
                                        generate Lorem</h5>
                                </div>
                            </div>
                            <div class="media meida-md pb-2">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object mr-3 br-2"
                                            src="{{asset('assets/images/media/19.jpg')}}" alt="media1"> </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading font-weight-bold text-uppercase">Fitness
                                        Centers</h6>
                                    <ul class="mb-0 item3-lists d-flex">
                                        <li> <a href=""><i class="icon icon-user"></i> Gavin</a>
                                        </li>
                                        <li> <a href=""><i class="icon icon-location-pin"></i>
                                                UK</a> </li>
                                        <li> <a href=""><i class="icon icon-calendar"></i> Nov
                                                19</a> </li>
                                    </ul>
                                    <h5 class="font-weight-semibold mb-0 mt-2 text-muted">professor at
                                        Hampden-Sydney</h5>
                                </div>
                            </div>
                            <div class="media meida-md pb-0">
                                <div class="media-left">
                                    <a href="#"> <img class="media-object mr-3 br-2"
                                            src="{{asset('assets/images/media/1.jpg')}}" alt="media1"> </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading  font-weight-bold text-uppercase">Clinics</h6>
                                    <ul class="mb-0 item3-lists d-flex">
                                        <li> <a href=""><i class="icon icon-user"></i> Gavin</a>
                                        </li>
                                        <li> <a href=""><i class="icon icon-location-pin"></i>
                                                USA</a> </li>
                                        <li> <a href=""><i class="icon icon-calendar"></i> Nov
                                                17</a> </li>
                                    </ul>
                                    <h5 class="font-weight-semibold mb-0 mt-2 text-muted">structures, to
                                        generate Lorem</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patients List</h4>
                    </div>
                    <div class="card-body">
                        <ul class="visitor list-unstyled list-unstyled-border">
                            <li class="media pt-0 mt-0"> <img class="mr-3 rounded-circle" width="45"
                                    src="{{asset('assets/images/users/male/6.jpg')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>10-9-2018</small></div>
                                    <div class="media-title">Vanessa</div> <small class="text-muted">sed
                                        do eiusmod </small>
                                </div>
                            </li>
                            <li class="media mt-4"> <img class="mr-3 rounded-circle" width="45"
                                    src="{{asset('assets/images/users/female/2.jpg')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>15-9-2018</small></div>
                                    <div class="media-title"> Rutherford</div> <small
                                        class="text-muted">sed do eiusmod </small>
                                </div>
                            </li>
                            <li class="media mt-4"> <img class="mr-3 rounded-circle" width="45"
                                    src="{{asset('assets/images/users/male/3.jpg')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>17-9-2018</small></div>
                                    <div class="media-title">Elizabeth </div> <small
                                        class="text-muted">sed do eiusmod </small>
                                </div>
                            </li>
                            <li class="media mt-4"> <img class="mr-3 rounded-circle" width="45"
                                    src="{{asset('assets/images/users/male/3.jpg')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>17-9-2018</small></div>
                                    <div class="media-title">Elizabeth </div> <small
                                        class="text-muted">sed do eiusmod </small>
                                </div>
                            </li>
                            <li class="media mt-4"> <img class="mr-3 rounded-circle" width="45"
                                    src="{{asset('assets/images/users/female/25.jpg')}}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right"><small>19-9-2018</small></div>
                                    <div class="media-title">Anthony </div> <small class="text-muted">sed
                                        do eiusmod </small>
                                </div>
                            </li>
                            <li class="media mt-4 border-b0 mb-0"> <img class="mr-3 rounded-circle"
                                    width="45" src="{{asset('assets/images/users/male/12.jpg')}}"
                                    alt="avatar">
                                <div class="media-body mb-0">
                                    <div class="float-right"><small>22-9-2018</small></div>
                                    <div class="media-title"> Lambert</div> <small class="text-muted">sed
                                        do eiusmod</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img alt="image" src="{{asset('assets/images/users/female/21.jpg')}}"
                                class="rounded-circle w-15">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <b>Lilly </b>posted in Website
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-danger mr-1"></i>
                                        <p class="mb-0">Hellooo!</p>
                                    </div>
                                    <small class="text-muted ml-auto">4 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img alt="image" src="{{asset('assets/images/users/male/12.jpg')}}"
                                class=" rounded-circle w-15 ">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <b>Thomos</b>posted in Material
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-danger mr-1"></i>
                                        <p class="mb-0">Nice!</p>
                                    </div>
                                    <small class="text-muted ml-auto">3 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img alt="image" src="{{asset('assets/images/users/female/8.jpg')}}"
                                class=" rounded-circle w-15">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <b>Marry cott </b>posted in photo
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-danger mr-1"></i>
                                        <p class="mb-0">That's Great!</p>
                                    </div>
                                    <small class="text-muted ml-auto">2 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom  py-3 ">
                            <img alt="image" src="{{asset('assets/images/users/male/7.jpg')}}"
                                class=" rounded-circle w-15">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <b>Jacob Brown </b>posted in photo
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-danger mr-1"></i>
                                        <p class="mb-0">That's Great!</p>
                                    </div>
                                    <small class="text-muted ml-auto">2 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center py-3 ">
                            <img alt="image" src="{{asset('assets/images/users/female/3.jpg')}}"
                                class=" rounded-circle w-15">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <b>Katrine</b> posted in photo
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-danger mr-1"></i>
                                        <p class="mb-0">That's Great!</p>
                                    </div>
                                    <small class="text-muted ml-auto">2 hours ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Latest Posts</div>
                    </div>
                    <div class="card-body">
                        <div class="new-posts">
                            <div class="new-postsinfo">
                                <div class="new-postsdata d-flex align-items-center mt-auto">
                                    <h6 class="text-danger font-weight-semibold text-uppercase mb-0">
                                        Fitness Centers</h6>
                                    <a href="javascript:void(0)" class="ml-auto  text-muted"> 10 days ago
                                    </a>
                                </div>
                                <div class="new-postsdata border-bottom">
                                    <h4 class="mt-3 font-weight-semibold ">New Fitness equipment Available
                                    </h4>
                                    <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia
                                        dolor sit amet, consectetur, adipisci velit sed quia non numquam
                                        eius modi tempora .</p>
                                </div>
                            </div>
                            <div class="new-postsinfo">
                                <div class="new-postsdata d-flex align-items-center mt-4">
                                    <h6 class="text-danger font-weight-semibold text-uppercase mb-0">
                                        Hospitals</h6>
                                    <a href="javascript:void(0)" class="ml-auto  text-muted"> 7 hours </a>
                                </div>
                                <div class="new-postsdata">
                                    <h4 class="mt-3 font-weight-semibold ">Advanced Technology Available
                                    </h4>
                                    <p class="text-muted mb-0">Neque porro quisquam est, qui dolorem ipsum
                                        quia dolor sit amet, consectetur, adipisci velit sed quia non
                                        numquam eius modi tempora .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer z-index-10 text-white">
                        <a href="#" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payments List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Patient Name</th>
                                        <th>Doctor</th>
                                        <th>Fees</th>
                                        <th>Bill Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#INV-348</td>
                                        <td>Christina Thomas</td>
                                        <td>Dr.Jessica</td>
                                        <td class="font-weight-semibold fs-16">$89</td>
                                        <td>17-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-186</td>
                                        <td>Anna Sthesia</td>
                                        <td>Dr.Grace</td>
                                        <td class="font-weight-semibold fs-16">$14,276</td>
                                        <td>14-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-831</td>
                                        <td>Gail Forcewind</td>
                                        <td>Dr.Nancy Perez</td>
                                        <td class="font-weight-semibold fs-16">$25,000</td>
                                        <td>04-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-672</td>
                                        <td>Paige Turner</td>
                                        <td>Dr.Angela</td>
                                        <td class="font-weight-semibold fs-16">$50.00</td>
                                        <td>07-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-428</td>
                                        <td>Bob Frapples</td>
                                        <td>Dr.julia</td>
                                        <td class="font-weight-semibold fs-16">$99.99</td>
                                        <td>11-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-543</td>
                                        <td>Sthesia</td>
                                        <td>Dr.Daina</td>
                                        <td class="font-weight-semibold fs-16">$145</td>
                                        <td>12-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#INV-986</td>
                                        <td>Gail Forcewind</td>
                                        <td>Dr.Ashley</td>
                                        <td class="font-weight-semibold fs-16">$378</td>
                                        <td>07-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="View"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger btn-sm text-white mb-1"
                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
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
@endsection
