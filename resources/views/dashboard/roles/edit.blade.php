@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Role</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('roles.update',$role->id) }}" method="post">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="name" value="{{ old('name',$role->name) }}" class="form-control mb-3" id="name" placeholder="role name">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Guard Name</label>
                    <div class="col-sm-10">
                        <input type="text"  name="guard_name" value="{{ old('guard_name',$role->guard_name) }}" class="form-control mb-3" id="guard_name" placeholder="guard name">
                        @error('guard_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" name="submit">Update</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection


