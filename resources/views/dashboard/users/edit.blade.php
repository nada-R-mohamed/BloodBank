@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">User</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('users.update',$user->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                {{--name field--}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ old('name',$user->name) }}"
                               class="form-control @error('name') is-invalid @enderror" name="name" required
                               autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>
                {{--email field--}}
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="text" value="{{ old('email',$user->email) }}"
                               class="form-control @error('email') is-invalid @enderror" name="email" required
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>
                {{--role field--}}
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Role</label>
                    <div class="col-md-6">
                        <select name="role" class="form-control form-select">
                            <option value="">All Roles</option>
                            @foreach($roles as $role)
                                {{--  value="{{ $governorate->id }}"@selected(old('governorate_id', $city->governorate_id) == $governorate->id)  --}}
                                <option
                                    value="{{ $role->name  }}" @selected( old('role',$user->role) == $role->name )>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>
                {{--password field--}}
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input name="password_confirmation" type="password" class="form-control" id="confirmPassword"
                               placeholder="Confirm Password">
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


