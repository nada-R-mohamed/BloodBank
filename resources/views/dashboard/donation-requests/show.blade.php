@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Donation Details</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->patient_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->patient_phone }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->patient_age }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Hospital Name</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->hospital_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Hospital Address</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->hospital_address }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">City ID</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->city_id }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Blood Type ID</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->blood_type_id }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Bags Number</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->bags_num }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">All Details</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->details }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Client ID</label>
                            <div class="col-sm-10">
                                {{ $donationDetails->client_id }}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection


