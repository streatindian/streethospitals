@extends('layouts.provider.default')
@section('content')
    <style>
        .ap {
  margin: 0;
  background: #a29fa52b;
  height: 100vh;
  display: grid;
  place-items: center;
  border-radius: 3px;
}
        .mya {
            position: relative;
            padding: 30px 60px;
            box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.4);
            color: #999;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 4px;
            font: 700 30px consolas;
            overflow: hidden;
        }

        .mya span:nth-child(1) {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, gray, #171717);
            animation: animate1 2s linear infinite;
        }

        @keyframes animate1 {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .mya span:nth-child(2) {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to bottom, gray, #454645);
            animation: animate2 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes animate2 {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .mya span:nth-child(3) {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to left, gray, #7b7e7b);
            animation: animate3 2s linear infinite;
        }

        @keyframes animate3 {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .mya span:nth-child(4) {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to top, gray, #909490);
            animation: animate4 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes animate4 {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
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
