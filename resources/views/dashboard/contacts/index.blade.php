@extends('layouts.dashboard')
@section('title','All Clients')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">All Contacts</li>
@endsection

@section('content')

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
                <div class="form-group">
                    <form action="" method="get">
                        <div class="col-sm-10">
                            <input type="text"  name="search" class="form-control" id="name" placeholder="search">
                            <button class="btn btn-info"  type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-auto">
                                <h3 class="card-title">All Contacts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Client Id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Is Done</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->client_id }}</td>
                                            <td>{{ $contact->content }}</td>
                                            <td>{{ $contact->is_done }}</td>
                                            <td>
                                                <form action="{{ route('clients.destroy',$client->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    {{ $contacts->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
