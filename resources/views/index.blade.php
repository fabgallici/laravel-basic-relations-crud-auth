@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Posts</h1>
    </div>
    <div class="col-12 text-right">
        @auth
            <a class="btn-primary btn right create" href="{{ route('posts.create') }}">Aggiungi Nuovo</a>
        @endauth
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Aggiorna</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($post->postInformation->description, $limit = 30, $end = '...') }}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            <span><a class="post-tag-remove" href="{{ route('post.tag.remove', [$post, $tag]) }}">X</a> {{ $tag->title }}, </span>
                        @endforeach                 
                    </td>
                    <td>
                        @auth
                            @if ( Auth::user()->id == $post->user->id )
                                <a class="btn btn-success" href="{{ route('posts.edit', $post) }}">Aggiorna</a>
                            @endif                         
                        @endauth
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @method('delete')
                            @csrf
                            @auth
                                @if ( Auth::user()->id == $post->user->id )
                                    <input class="btn btn-danger" value="Elimina" type="submit">
                                @endif                         
                            @endauth
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-12">
        {{ $posts->links() }}
    </div>
</div>



@endsection
