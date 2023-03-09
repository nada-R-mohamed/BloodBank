@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Create City</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Create City</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('cities.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="city name">
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
                                        value="{{ $governorate->id }}" {{old('governorate_id') }}>{{ $governorate->name }}</option>
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
                <button type="submit" class="btn btn-info" name="submit">Save</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection


