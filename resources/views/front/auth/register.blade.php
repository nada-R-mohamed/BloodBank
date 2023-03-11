@extends('layouts.front-master')
@inject('governorates','App\Models\Governorate')
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create new account</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">

                <form>
                    <input type="email" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="E-mail">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input placeholder="Birth date" name="date_of_birth" class="form-control" type="text" onfocus="(this.type='date')"
                           id="date">
                    @error('date_of_birth')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="email" class="form-control" name="blood_type_id" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Blood type">
                    @error('blood_type_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <select name="governorate_id" class="form-control">
                        <option value="">Governorate</option>
                        <option>Dakahlia</option>
                        <option>Cairo</option>
                        <option>Alexandria</option>
                    </select>
                    @error('governorate_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <select name="city_id" class="form-control">
                        <option selected>City</option>
                        <option>Mansoura</option>
                        <option>Cairo</option>
                        <option>Alexandria</option>
                    </select>
                    @error('city_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Telephone number">
                    @error('phone')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input placeholder="Last date for donation" name="last_donation_date" class="form-control" type="text"
                           onfocus="(this.type='date')" id="date">
                    @error('last_donation_date')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1"
                           placeholder="confirm password">
                    @error('confirm_password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="create-btn">
                        <input type="submit" value="Creat">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
