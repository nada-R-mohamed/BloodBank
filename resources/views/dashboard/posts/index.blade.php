@extends('layouts.dashboard')
@section('title','All Posts')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">All Posts</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-header">
                <button type="button" class="btn btn-info"><a class="text-dark" href="{{ route('posts.create') }}">Create</a></button>
            </div>
        </div>
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
                    <div class="form-group">
                        <form action="" method="get">
                            <div class="col-sm-10">
                                <input type="text"  name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="title">
                                <input type="text"  name="content" value="{{ old('content') }}" class="form-control" id="content" placeholder="content">
                                <select name="category_id" class="form-control form-select">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-info"  type="submit" name="find">Search</button>
                            </div>
                        </form>
                    </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mb-auto">
                                <h3 class="card-title">All Posts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th style="width: 100px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('posts.show',$post->id) }}">{{$post->title}}</a></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm"><a class="text-success" href="{{ route('posts.edit',$post->id) }}">Edit</a></button>
                                            </td>
                                            <td>
                                                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
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
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
