@extends('layouts.front-master')
@section('content')

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign in</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form>
                    <div class="logo">
                        <img src="imgs/logo.png">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Telephone number">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder=" Password">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="imgs/complain.png">
                            <a href="#">Forgot password</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a href="#">Sign in</a>
                        </div>
                        <div class="col-md-6 left">
                            <a href="create-account-ltr.html">create new account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>    </div>

@endsection
