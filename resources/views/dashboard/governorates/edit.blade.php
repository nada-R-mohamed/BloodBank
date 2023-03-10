@extends('layouts.dashboard')
{{--@section('title','Governorate')--}}
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Governorate</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Governorate</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('governorates.update',$governorate->id) }}" method="post">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name',$governorate->name) }}"
                               class="form-control mb-3" id="name" placeholder="governorate name">
                        @error('name')
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


