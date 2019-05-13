@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Home
                    <a class="float-right btn btn-sm btn-primary" href="{{ route('posts.create') }}">Create</a>
                </div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="">
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->description }}</p>
                            <div>
                                <span class="badge badge-success">Posted: {{ $post->created_at }}</span>
                                <span class="badge badge-info">By: {{ $post->user->name }}</span>
                                <span class="badge badge-primary">{{ $post->category->name }}</span>
                                
                                <div class="float-right">
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-secondary">{{ $tag->name }}</span> 
                                    @endforeach
                                </div>
                            </div> 
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
