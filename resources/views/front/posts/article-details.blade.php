@extends('layouts.front-master',['bodyClass' => 'article-details'])
@section('content')
    <!--inside-article-->
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Disease prevention</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="{{ url('storage/'. $post->image) }}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>{{ $post->title }}</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    {{ $post->content }}
                </p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>Related articles</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{ url('storage/'.$relatedPost->image) }}" class="card-img-top" alt="...">
                                        <a href="{{ route('article-details',$relatedPost->id) }}" class="click">more</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $relatedPost->title }}</h5>
                                        <p class="card-text">
                                           {{ $relatedPost->content }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
