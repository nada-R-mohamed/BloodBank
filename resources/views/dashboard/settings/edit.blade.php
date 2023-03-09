@extends('layouts.dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Setting</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-auto">
                        <h3 class="card-title">Setting</h3>
                    </div>
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
                    <!-- /.card-header -->
                    <form class="form-horizontal" action="{{ route('settings.update',$setting->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Notification Setting Text</label>
                                <div class="col-sm-10">
                                    <input type="text" name="notification_setting_text" class="form-control"
                                           value="{{ old('notification_setting_text',$setting->notification_setting_text) }}"
                                           id="notification_setting_text">
                                    @error('notification_setting_text')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">About App</label>
                                <div class="col-sm-10">
                                    <textarea id="about_app" name="about_app" rows="3"
                                              class="form-control">{{ old('about_app',$setting->about_app) }}</textarea>
                                    @error('about_app')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control"
                                           value="{{ old('phone',$setting->phone) }}" id="phone">
                                    @error('phone')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control"
                                           value="{{ old('email',$setting->email) }}" id="email">
                                    @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="facebook_url" class="col-sm-2 col-form-label">Facebook Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="facebook_url" class="form-control"
                                           value="{{ old('facebook_url',$setting->facebook_url) }}" id="facebook_url">
                                    @error('facebook_url')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter_url" class="col-sm-2 col-form-label">Twitter Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="twitter_url" class="form-control"
                                           value="{{ old('twitter_url',$setting->twitter_url) }}" id="twitter_url">
                                    @error('twitter_url')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram_url" class="col-sm-2 col-form-label">Instagram Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="instagram_url" class="form-control"
                                           value="{{ old('instagram_url',$setting->instagram_url) }}"
                                           id="instagram_url">
                                    @error('instagram_url')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="youtube_url" class="col-sm-2 col-form-label">Youtube Url</label>
                                <div class="col-sm-10">
                                    <input type="text" name="youtube_url" class="form-control"
                                           value="{{ old('youtube_url',$setting->youtube_url) }}" id="youtube_url">
                                    @error('youtube_url')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        @can('settings edit')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="submit">Update</button>
                            </div>
                        @endcan
                        <!-- /.card-footer -->
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection


