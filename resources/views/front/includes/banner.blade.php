<section>
    <div class="banner-2 cover-image sptb-2 sptb-tab bg-background2 banner-section"
        data-image-src="{{ asset('assets/images/banners/banner1.jpg') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="mb-1">Find the Nearest Medical Facility</h1>
                    <p>It is a long established fact that a reader will be distracted by the when looking at its
                        layout.</p>
                </div>
                <div class="row">
                    <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="item-search-tabs">
                            <div class="item-search-menu">
                                <ul class="nav">
                                    {{-- <li class="">
                                        <a class="active" data-toggle="tab" href="#tab1">Hospitals</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab2">Doctors</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab3">FitnesCenters</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab4">Pharmacies</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab5">Clinics</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab6">Blood Banks</a>
                                    </li> --}}
                                    @foreach ($category as $ck => $c)
                                        <li class="">
                                            <a class="{{$ck==0?'active':''}}" data-toggle="tab" href="#tab{{$c->slug}}">{{$c->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-content index-search-select">
                                <div class="tab-pane active" id="tabhospitals">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <input class="form-control border" placeholder="Search Location"
                                                    type="text">
                                                <span><i class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Type Of Hospitals
                                                        </option>
                                                        <option value="1">
                                                            Women's hospitals
                                                        </option>
                                                        <option value="2">
                                                            Children's hospitals
                                                        </option>
                                                        <option value="4">
                                                            Cardiac hospitals.
                                                        </option>
                                                        <option value="5">
                                                            Cancer Hosptals
                                                        </option>
                                                        <option value="5">
                                                            Diagnostic centers
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max Fees
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabdoctor">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Type Of Doctors
                                                        </option>
                                                        <option value="1">
                                                            Dentist
                                                        </option>
                                                        <option value="2">
                                                            Gynecologist
                                                        </option>
                                                        <option value="4">
                                                            Physiotherapist
                                                        </option>
                                                        <option value="5">
                                                            Neurosurgeon
                                                        </option>
                                                        <option value="5">
                                                            Neurologist
                                                        </option>
                                                        <option value="5">
                                                            Infertility Specialist
                                                        </option>
                                                        <option value="5">
                                                            Cardiologist
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max Fees
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabfitnescenter">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Fitness Centers
                                                        </option>
                                                        <option value="1">
                                                            Aerobic Centers
                                                        </option>
                                                        <option value="2">
                                                            Yoga Centers
                                                        </option>
                                                        <option value="4">
                                                            Dance Centers
                                                        </option>
                                                        <option value="5">
                                                            Pilates Centers
                                                        </option>
                                                        <option value="5">
                                                            Gyms
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max Fees
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabpharmacies">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Pharmacies
                                                        </option>
                                                        <option value="1">
                                                            Retail pharmacy
                                                        </option>
                                                        <option value="2">
                                                            Hospital pharmacy
                                                        </option>
                                                        <option value="4">
                                                            Clinic pharmacy
                                                        </option>
                                                        <option value="5">
                                                            Home care pharmacy
                                                        </option>
                                                        <option value="5">
                                                            Mail order pharmacy
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max price
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabmassage-parlours">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Massage Parlour
                                                        </option>

                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max price
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabclinics">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Clinics
                                                        </option>
                                                        <option value="1">
                                                            Physiotherapy Clinics
                                                        </option>
                                                        <option value="2">
                                                            Dental Clinics
                                                        </option>
                                                        <option value="4">
                                                            Walk-in Urgent Care Clinics
                                                        </option>
                                                        <option value="5">
                                                            Chiropractor Clinics
                                                        </option>
                                                        <option value="5">
                                                            Rehabilitation Clinics
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Max Fees
                                                        </option>
                                                        <option value="1">
                                                            $10k
                                                        </option>
                                                        <option value="2">
                                                            $10k-$20K
                                                        </option>
                                                        <option value="3">
                                                            $20K-$30K
                                                        </option>
                                                        <option value="4">
                                                            $30K-$40K
                                                        </option>
                                                        <option value="5">
                                                            $40K-$50K
                                                        </option>
                                                        <option value="6">
                                                            $50K-$60K
                                                        </option>
                                                        <option value="7">
                                                            $60K-$70K
                                                        </option>
                                                        <option value="8">
                                                            $70k-$80K
                                                        </option>
                                                        <option value="9">
                                                            $80K &lt; Above
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabbloodbanks">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div class="form-group col-xl-4 col-lg-4 col-md-12 mb-0 location">
                                                <div class="form-group mb-0">
                                                    <input class="form-control border"
                                                        placeholder="Search Location" type="text"> <span><i
                                                            class="fa fa-crosshairs  location-gps mr-1"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Blood Banks
                                                        </option>
                                                        <option value="1">
                                                            Central Blood Center
                                                        </option>
                                                        <option value="2">
                                                            San Diego Blood Bank
                                                        </option>
                                                        <option value="4">
                                                            Delta Blood Bank
                                                        </option>
                                                        <option value="5">
                                                            Heartland Blood Centers
                                                        </option>
                                                        <option value="5">
                                                            Florida’s Blood Centers
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="">
                                                        <option>
                                                            Distance
                                                        </option>
                                                        <option value="1">
                                                            3km
                                                        </option>
                                                        <option value="2">
                                                            6km
                                                        </option>
                                                        <option value="3">
                                                            9km
                                                        </option>
                                                        <option value="4">
                                                            10km
                                                        </option>
                                                        <option value="5">
                                                            20km
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <select
                                                    class="form-control select2-show-search border-bottom-0 w-100"
                                                    data-placeholder="Select">
                                                    <optgroup label="Categories">
                                                        <option>
                                                            Available Bloodgroups
                                                        </option>
                                                        <option value="1">
                                                            A negative
                                                        </option>
                                                        <option value="2">
                                                            A positive
                                                        </option>
                                                        <option value="3">
                                                            B negative
                                                        </option>
                                                        <option value="4">
                                                            B positive
                                                        </option>
                                                        <option value="5">
                                                            AB negative
                                                        </option>
                                                        <option value="6">
                                                            AB positive
                                                        </option>
                                                        <option value="7">
                                                            O negative
                                                        </option>
                                                        <option value="8">
                                                            O positive
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                <a class="btn btn-block btn-orange fs-14" href="#"><i
                                                        class="fa fa-search"></i> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
