@extends('layouts.front-master',[
    'bodyClass' => 'contact-us'
])
@section('content')
    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>Contact us</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('website/imgs/logo-ltr.png') }}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>Telephone nomber:</span> {{ $settings->phone }}</li>
                                    <li><span>Fax:</span> {{ $settings->phone }}</li>
                                    <li><span>E-mail:</span>{{ $settings->email }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>Contact us</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{ $settings->facebook_url }}"><img src="{{ asset('website/imgs/001-facebook.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->twitter_url }}"><img src="{{ asset('website/imgs/002-twitter.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->youtube_url }}"><img src="{{ asset('website/imgs/003-youtube.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->instagram_url }}"><img src="{{ asset('website/imgs/004-instagram.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->phone }}"><img src="{{ asset('website/imgs/005-whatsapp.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $settings->instagram_url }}"><img src="{{ asset('website/imgs/006-google-plus.svg') }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>Connect with us</h4>
                        </div>
                        <div class="fields">
                            <form method="" action="">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telephone number" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Message title" name="title">
                                <textarea placeholder="Text message" class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                                <button type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
