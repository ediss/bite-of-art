@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
{{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style2.css')}}" /> --}}
@endsection

@section('logo-img')
<img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
@endsection
@section('content')
<div class="row">
    <div class="col-12 p-0 m-0 h-80px h-100px">
        <h1 class="page-heading text-center montserrat-bold pt-4 mb-0">{{__('contact')}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form id="contact-form" name="contact-form" action="{{ route('contact', app()->getLocale()) }}" method="POST">
            @csrf
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control p-0"
                            placeholder="{{__("full_name")}}">
                        <!-- <label for="name" class="">Your name</label> -->
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control p-0"
                            placeholder="{{__("e-mail")}}">

                    </div>
                </div>
            </div>
            <!--Grid row-->


            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <textarea type="text" id="message" name="message" rows="5"
                            class="form-control p-0 md-textarea contact-textarea"
                            placeholder="{{__("text_message")}}"></textarea>

                    </div>
                </div>
            </div>

            <div class="col-lg-10 social mt-3 pl-0">
              
                <a target="_blank" class="mr-2" href="https://www.instagram.com/biteof.art">
                    <img class="" src="{{ asset('images/social-network/instagram.png') }}">
                </a>
                <a target="_blank" href="https://www.facebook.com/biteofartofficial" class="fb-xfbml-parse-ignore mr-2">
                    <img class="" src="{{ asset('images/social-network/facebook.png') }}">
                </a>
                <a target="_blank" class="mr-2" href="https://twitter.com/biteofart">
                    <img class="" src="{{ asset('images/social-network/twitter.png') }}">
                </a>


            </div>
            <div class="row btn-sbm-mt">
                <div class="col-md-6 offset-md-3  text-center">
                    <input type="submit" value="{{__("submit")}}" class="contact-submit">
                </div>
            </div>
            <!--Grid row-->

        </form>
    </div>
</div>
@endsection