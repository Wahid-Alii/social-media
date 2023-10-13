@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf()
                            <div class="card shadow rounded border">
                                <div class="card-body">
                                    <div class="oneline">

                                        <div class="form-group">
                                            <textarea name="description" id="description" class="form-control" rows="2" cols="75" autofocus
                                                placeholder="Enter you description about the post" required></textarea><br><br>
                                        </div>

                                    </div>

                                    <div class="row ">
                                        {{-- <div class="form-group">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        </div> --}}
                                        <div class="col-sm-6  text-right">
                                            <button type="submit" class="btn btn-primary">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div>
                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    {{-- @dd($post->users->name); --}}
                                    <div class="row mb-2 rounded">
                                        <div class="col-12">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="" class="imgcircle d-inline">
                                                    {{-- <img class="imgcircle d-inline" src="img/1.jpg"> --}}

                                                    <div class="d-inline">
                                                        <div class="name d-inline ml-1"><b> </b></div>
                                                        <div class="mail d-inline text-muted">
                                                            <strong> {{ $post->users->name }} </strong>
                                                        </div>
                                                        <div class="time d-inline text-muted"><small> •
                                                                {{ $post->created_at->diffForHumans() }}
                                                            </small>

                                                        </div>
                                                        <p class="mt-2 ml-3">{{ $post->description }} </p>
                                                    </div>

                                                </div>
                                                <div class="container mb-1">
                                                    <div class="row icons">
                                                        @if (!$post->likedBy(auth()->user()))
                                                            <form action="{{ route('like.store', $post->id) }}"
                                                                method="post" class="col-4 d-inline">
                                                                @csrf

                                                                <button type="submit" class="border-0 bg-transparent"
                                                                style="font-size: 20px;">
                                                                <i class="far fa-thumbs-up"></i> {{ $post->likes->count() > 0 ?  $post->likes->count() : ''}}
                                                            </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('like.delete', $post) }}" method="post"
                                                                class="col-4 d-inline">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="border-0 bg-transparent"
                                                                style="font-size: 20px; color:blue">
                                                                <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() > 0 ?  $post->likes->count() : ''}}
                                                            </button>
                                                            </form>
                                                        @endif

                                                        {{-- <form action="" method="post" class="col-4 d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="border-0 bg-transparent"
                                                        style="font-size: 20px;"><i class="fas fa-heart"
                                                            style="color: #7A2522"></i>
                                                    </button>
                                                </form> --}}
                                                        <div class="col-4 d-inline" style="font-size: 25px;"><i
                                                                class="far fa-thumbs-down"> </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h1>no post yet</h1>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
