@extends('layouts.app')

@section('content')

  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Title: {{ $post ->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Author: {{ $post ->author }}</h6>
    <p class="card-text">Description: {{ $post->postInformation->description }}</p>

    <div> Tags:
      @foreach ($post->tags as $tag)
        <span>{{ $tag->title }} - </span>
       @endforeach
    </div>
    

    <a href="{{ route('posts.index')}}" class="btn btn-primary">Back to Posts</a>
  </div>
</div>
@endsection