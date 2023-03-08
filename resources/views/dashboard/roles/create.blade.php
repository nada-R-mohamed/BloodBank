@extends('layouts.dashboard')
@inject('permissions','App\Models\Permission')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Roles</li>
@endsection

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Create Role</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal" action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Role Name :</label>
                    <div class="col-sm-10">
                        <input type="text"  name="name" class="form-control" id="name" placeholder="Role name">
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
                     @foreach($permissions->all() as $permission)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox1" value="{{ $permission->id }}">
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
                <button type="submit" class="btn btn-info" name="submit">Save</button>
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


