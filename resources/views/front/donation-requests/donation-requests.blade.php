@extends('layouts.front-master',['bodyClass' => 'donation-requests'])
@inject('bloodTypes','App\Models\BloodType')
@inject('cities','App\Models\City')
@section('content')
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Donation requests</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>Donation requests</h2>
                </div>
                <div class="content">
                    <form class="row filter" method="get" action="">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="search" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose blood type</option>
                                        @foreach($bloodTypes->all() as $bloodType)
                                        <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select name="search" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Choose city</option>
                                        @foreach($cities->all() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        @foreach($donations as $donation)
                        <div class="details">
                            <div class="blood-type">
                                <h2>{{ $donation->bloodType->name }}</h2>
                            </div>
                            <ul>
                                <li><span>Patoent name:</span> {{ $donation->patient_name }}</li>
                                <li><span>Hospital:</span> {{ $donation->hospital_name }}</li>
                                <li><span>City:</span> {{ $donation->city->name }}</li>
                            </ul>
                            <a href="{{ route('donation.details',$donation->id) }}">Details</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{ $donations->withQueryString()->links() }}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                        <span aria-hidden="true">&laquo;</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="#" aria-label="Next">--}}
{{--                                        <span aria-hidden="true">&raquo;</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
