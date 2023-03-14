@extends('layouts.front-master',['bodyClass' => 'create'])
@inject('governorates','App\Models\Governorate')
@inject('bloodTypes','App\Models\BloodType')
@inject('cities','App\Models\City')
@section('content')

    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create new account</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form ">
                <form  method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control m-3 lg" id="exampleFormControlInput1" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control m-3" id="exampleFormControlInput1" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="date_of_birth" value="{{ old('"date_of_birth') }}" placeholder="Birth date" class="form-control m-3"  onfocus="(this.type='date')"
                           id="date">
                    @error('date_of_birth')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <select class="form-control m-3" name="blood_type_id">
                        <option selected>Blood Type</option>
                        @foreach($bloodTypes->all() as $bloodType)
                            <option
                                value="{{ $bloodType->id }}" {{ old('bloodType_id') }}>{{ $bloodType->name }}</option>
                        @endforeach
                    </select>
                    @error('blood_type_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <select class="form-control m-3">
                        <option selected>Governorate</option>
                        @foreach($governorates->all() as $governorate)
                            <option
                                value="{{ $governorate->id }}" {{ old('governorate_id') }}>{{ $governorate->name }}</option>
                        @endforeach
                    </select>
                    @error('governorate_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <select class="form-control m-3" name="city_id">
                        <option selected>City</option>
                        @foreach($cities->all() as $city)
                            <option
                                value="{{ $city->id }}" {{ old('city_id') }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="phone"  value="{{ old('phone') }}"  class="form-control m-3" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Telephone number">
                    @error('phone')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input placeholder="Last date for donation" name="last_donation_date"  value="{{ old('last_donation_date') }}"  class="form-control m-3" type="text"
                           onfocus="(this.type='date')" id="date">
                    @error('last_donation_date')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" name="password" value="{{ old('password') }}"  class="form-control m-3" id="exampleInputPassword1" placeholder="password">
                    @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" name="password_confirmation" class="form-control m-3" id="exampleInputPassword1"
                           placeholder="confirm password">
                    @error('password_confirmation')
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

