@extends('layout.app')

@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-style.css')}}" />
@endsection

@section('logo-img')
    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
@endsection
@section('content')
<div class="row">
    <div class="col-12 p-0 m-0 h-80px h-100px">
        <h1 class="page-heading text-center montserrat-bold pt-4 mb-0">
            {{ $tag ? "Access only allowed for devices bigger than smartphones" : "YOU NEED TO ENABLE JAVASCRIPT IN YOUR BROWSER!"}}
            
        </h1>
    </div>
</div>
@endsection
