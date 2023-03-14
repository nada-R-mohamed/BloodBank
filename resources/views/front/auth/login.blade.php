@extends('layouts.front-master',['bodyClass' => 'signin-account'])
@section('content')

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <div class="logo">
                    <img src="{{ url(asset('website/imgs/logo.png')) }}">
                </div>
                <form method="post" action="{{ route('login.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Telephone number">
                        @error('phone')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                               id="exampleInputPassword1" placeholder=" Password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{ url(asset('website/imgs/complain.png')) }}">
                            <a href="#">Forgot password</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                           <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{ route('register.create') }}">create new account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
