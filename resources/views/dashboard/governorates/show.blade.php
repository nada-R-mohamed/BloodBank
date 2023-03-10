@extends('layouts.dashboard')
{{--@section('title','Governorate')--}}
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Governorate</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title">{{ $governorate->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Governorate Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $governorate->id }}</td>
                                <td>{{ $governorate->name }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
    </div>
    </div>

@endsection


