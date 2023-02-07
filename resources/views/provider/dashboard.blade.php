@extends('layouts.provider.default')
@section('content')

    <div class="app-content  my-3 my-md-5">
        <div class="side-app">


          <div class="row" style="margin-top:5rem;">
            <div class="col-md-12 ap">
                <a href="{{route('provider.listing.add')}}"  class="mya">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                    <span> </span>
                   <i class="fa fa-plus"></i> Add First Listing
                </a>
            </div>
          </div>

        </div>
    </div>
@endsection
