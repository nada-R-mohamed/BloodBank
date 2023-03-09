@extends('layouts.dashboard')
@section('title','All Governorates')
@section('content')
    <div class="container">
        @can('governorates create')
            <div class="row">
                <div class="card-header">
                    <button type="button" class="btn btn-info"><a class="text-dark"
                                                                  href="{{ route('governorates.create') }}">Create</a>
                    </button>
                </div>
            </div>
        @endcan
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
                                <h3 class="card-title">All Governorates</h3>
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
                                    @foreach($governorates as $governorate)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('governorates.show',$governorate->id) }}">{{$governorate->name}}</a>
                                            </td>
                                            @can('governorates edit')
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm"><a
                                                            class="text-success"
                                                            href="{{ route('governorates.edit',$governorate->id) }}">Edit</a>
                                                    </button>
                                                </td>
                                            @endcan
                                            @can('governorates delete')
                                                <td>
                                                    <form action="{{ route('governorates.destroy',$governorate) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('Delete')
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-sm btn-flat show_confirm"
                                                                data-toggle="tooltip" title='Delete'>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{ $governorates->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
@endpush
