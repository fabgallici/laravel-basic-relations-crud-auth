@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Edit Post: {{ $post->title }}</h1>
    </div>
    <div class="col-12">
        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('patch')

            <div class="form-group">
                <label>Title</label>
                <input value="{{ $post->title }}" class="form-control" name="title" type="text" placeholder="Inserisci un titolo" />
            </div>

            <div class="form-group">
                <label>Autore</label>
                <input value="{{ $post->author }}" class="form-control" name="author" type="text" placeholder="Inserisci un autore" />
            </div>

            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category_id">
                    <option>---</option>
                    @foreach($categories as $category)

                        <option {{ $post->category->id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>

                    @endforeach
                </select>
            </div>

            <h3>Post Information Data</h3>
            <div class="form-group">
                <label>Descrizione</label>
                <textarea class="form-control" name="description" type="text" placeholder="Inserisci una descrizione">
                    {{ $post->postInformation->description }}
                </textarea>
            </div>

            <h3>Related Tags</h3>
            <div class="form-group">
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="tags_id[]" value="{{ $tag->id }}"
                            @if ($post -> tags() ->find($tag ->id)) checked @endif
                        >
                            {{-- {{ in_array($tag->title, $post -> tags() ->pluck('title')->toArray()) ? 'checked' : '' }}
                        > --}}
                        {{-- <input class="form-check-input" type="checkbox" id="defaultCheck1" name="tags_id[]" value="{{ $tag->id }}"
                            @if(in_array($tag->title, $post -> tags() ->pluck('title')->toArray())) checked @endif
                        > --}}
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $tag->title }}
                        </label>
                    </div>
                @endforeach
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Aggiorna" />
            </div>
        </form>
    </div>

</div>



@endsection
