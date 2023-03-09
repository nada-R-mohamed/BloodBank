@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit City</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit City</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('cities.update',$city->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ old('name',$city->name) }}" class="form-control"
                               id="name" placeholder="city name">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                @if(empty($governorates))
                    {{"Please Make The Governorate First" }}
                @else
                    <div class="form-group row">
                        <label for="governorate_id" class="col-sm-2 col-form-label">Governorates</label>
                        <div class="col-sm-10">
                            <select name="governorate_id" class="form-control form-select">
                                <option value="">All Governorates</option>
                                @foreach($governorates as $governorate)
                                    <option
                                        value="{{ $governorate->id }}"@selected(old('governorate_id', $city->governorate_id) == $governorate->id) >{{ $governorate->name }}</option>
                                @endforeach
                            </select>
                            @error('governorate_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif
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


