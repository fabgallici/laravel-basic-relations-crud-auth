@extends('layouts.app')

@section('content')

  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $post ->title }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $post ->author }}</h6>
    <p class="card-text">{{ $post->postInformation->description }}</p>
    <a href="{{ route('posts.index')}}" class="btn btn-primary">Back to Posts</a>
  </div>
</div>
@endsection