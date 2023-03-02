@extends('layouts.dashboard')
@section('title','All Donation Requests')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">All Donation Requests</li>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            @if(session()->has('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="form-group">
                    <form action="" method="get">
                        <div class="col-sm-10">
                            <input type="text"  name="search" class="form-control" id="name" placeholder="search">
                            <button class="btn btn-info"  type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-auto">
                                <h3 class="card-title">All Donations</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Patient Name</th>
                                        <th>Patient phone</th>
                                        <th>Patient age</th>
                                        <th>Blood Type</th>
                                        <th>Bags Number</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($donations as $donation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('donation-requests.show',$donation->id) }}">{{ $donation->patient_name }}</a></td>
                                            <td>{{ $donation->patient_phone }}</td>
                                            <td>{{ $donation->patient_age }}</td>
                                            <td>{{ $donation->blood_type_id }}</td>
                                            <td>{{ $donation->bags_num }}</td>
                                            <td>
                                                <form action="{{ route('donation-requests.destroy',$donation->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{ $donations->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
