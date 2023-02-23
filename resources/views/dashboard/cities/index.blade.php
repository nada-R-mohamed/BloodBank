@extends('layouts.dashboard')
@section('title','All Cities')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">All Cities</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-header">
                <button type="button" class="btn btn-info"><a class="text-dark" href="{{ route('cities.create') }}">Create</a></button>
            </div>
        </div>
    </div>

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-auto">
                                <h3 class="card-title">All Cities</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 100px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cities as $city)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('cities.show',$city->id) }}">{{$city->name}}</a></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm"><a class="text-success" href="{{ route('cities.edit',$city->id) }}">Edit</a></button>
                                            </td>
                                            <td>
                                                <form action="{{ route('cities.destroy',$city->id) }}" method="post">
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
                    {{ $cities->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
