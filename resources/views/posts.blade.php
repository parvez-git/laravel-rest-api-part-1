@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Blog
                    
                    @auth
                        <a class="float-right btn btn-sm btn-primary" href="{{ route('posts.create') }}">Create</a>
                    @endauth
                </div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="">
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->description }}</p>
                            @auth
                                <div class="d-inline">
                                    <a class="text-primary mr-2" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                </div>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input class="d-block btn bg-white p-0 m-0 text-danger" type="submit" value="Delete">
                                </form>
                            @endauth
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
