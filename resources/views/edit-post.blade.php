@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Post
                    <a class="float-right btn btn-sm btn-success" href="{{ route('posts.index') }}">Blog</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update',$post->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $post->description }}" required>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select name="category_id" id="category" class="form-control">
                                    <option disabled>--select--</option>
                                    @foreach ($categories as $item)
                                        @php 
                                            $selected = ($post->category_id === $item->id) ? 'selected' : ''; 
                                        @endphp
                                        <option value="{{ $item->id }}" {{ $selected }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                @foreach ($tags as $item)
                                    <div id="tags" class="form-check form-check-inline">
                                        <input name="tags[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{ $item->id }}" value="{{ $item->id }}"
                                            @foreach ($post->tags as $tag)
                                                {{ ($tag->id == $item->id) ? 'checked' : '' }}
                                            @endforeach
                                        >
                                        <label class="form-check-label" for="inlineCheckbox{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
