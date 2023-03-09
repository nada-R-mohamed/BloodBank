@extends('layouts.dashboard')
@section('title','All Clients')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">All Clients</li>
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
                                <h3 class="card-title">All Clients</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date of Birth</th>
                                        <th>Blood Type ID</th>
                                        <th>Last Donation Date</th>
                                        <th>City ID</th>
                                        <th  style="width: 100px">Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->date_of_birth }}</td>
                                            <td>{{ $client->blood_type_id }}</td>
                                            <td>{{ $client->last_donation_date }}</td>
                                            <td>{{ $client->city_id }}</td>
                                            @can('clients status')
                                            <td>
                                                <a href="{{url(route('clients.status',$client->id))}}">
                                                    @if($client->status=="active")
                                                        Deactivat
                                                    @else
                                                        Activate
                                                    @endif
                                                </a>
                                            </td>
                                            @endcan
                                            @can('clients delete')
                                            <td>
                                                <form action="{{ route('clients.destroy',$client->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{ $clients->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
