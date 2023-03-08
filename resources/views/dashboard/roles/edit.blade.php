@extends('layouts.dashboard')
@inject('list_of_permission','App\Models\Permission')
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
                <div class="form-group">
                    <label for="guard_name" class="form-label">Permissions :</label><br>
                    <input id="select-all" type="checkbox"><label for='select-all'>Select All</label>
                    <br>
                    <div class="row">
                        @foreach($list_of_permission->all() as $permission )
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox1" value="{{ $permission->id }}"
                                            @if($role->hasPermissionTo($permission->name))
                                                checked
                                            @endif
                                >
                                <label class="form-check-label" for="inlineCheckbox1">{{ $permission->name }}</label>
                            </div>
                            @error('permissions')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        @endforeach
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

@push('scripts')
    <script>
        $("#select-all").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

    </script>
@endpush
