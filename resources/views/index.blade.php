@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Posts</h1>
    </div>
    <div class="col-12 text-right">
        <a class="btn-primary btn right create" href="{{ route('posts.create') }}">Aggiungi Nuovo</a>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Aggiorna</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($post->postInformation->description, $limit = 30, $end = '...') }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('posts.edit', $post) }}">Aggiorna</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger" value="Elimina" type="submit">
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
