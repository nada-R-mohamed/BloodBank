@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Role</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title">{{ $role->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="guard_name" class="form-label">Role Name : </label>
                                <div class="col-sm-10">
                                    {{ $role->name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guard_name" class="form-label">Permissions :</label>
                                <div class="col-sm-10">
                                    @foreach($permissions as $permission)
                                        {{ $loop->iteration . "-  " . $permission->name." , " }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection


