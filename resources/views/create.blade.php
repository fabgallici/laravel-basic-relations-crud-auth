@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Create Post:</h1>
    </div>
    <div class="col-12">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Title</label>
                <input value="" class="form-control" name="title" type="text" placeholder="Inserisci un titolo" />
            </div>

            <div class="form-group">
                <label for="author">Autore</label>
                <input value="" class="form-control" name="author" type="text" placeholder="Inserisci un autore" />
            </div>

            <h3>Post Information Data</h3>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" name="description" type="text" placeholder="Inserisci una descrizione">
                </textarea>
            </div>

            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="category_id">
                    <option>---</option>
                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->title }}</option>

                    @endforeach
                </select>
            </div>

            <h3>Related Tags</h3>
            <div class="form-group">
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="tags_id[]" value="{{ $tag->id }}">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $tag->title }}
                        </label>
                    </div>
                @endforeach
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Crea" />
            </div>
        </form>
    </div>

</div>



@endsection
