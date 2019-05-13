<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif

                        <a href="{{ route('posts.index') }}">{{ __('Blog') }}</a>
                    @endauth
                </div>
            @endif

            <div class="container" style="margin-top:100px;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Home</div>
            
                            <div class="card-body">
                                @foreach($posts as $post)
                                    <div class="">
                                        <h1>{{ $post->title }}</h1>
                                        <p>{{ $post->description }}</p>
                                        <div>
                                            <span class="badge badge-success">Posted: {{ $post->created_at }}</span>
                                            <span class="badge badge-info">By: {{ $post->user->name }}</span>
                                            <span class="badge badge-primary">{{ $post->category->name }}</span>
                                            
                                            <div class="tags">
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

        </div>
    </body>
</html>
