@extends('layouts.front-master',['bodyClass' => 'who-are-us'])
@section('content')
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Who are us</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    <img src="{{ asset('website/imgs/logo-ltr.png') }}">
                </div>
                <div class="text">

                    <p>
                        {{ $settings->about_app }}
                    </p>

                </div>
            </div>
        </div>
    </div>

@endsection
