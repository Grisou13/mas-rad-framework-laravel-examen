@extends('layouts.app')

@section('content')
    <h1>{{is_null($article->id) ? "New article": "Edit article"}}</h1>
    <div class="row justify-content-between">
        <div class="col-4">
            <form action="{{ is_null($article->id) ? route('articles.store') : route('articles.update', ['article' => $article->id]) }}" method="POST">
                @if(is_null($article->id))
                    @method('POST')
                @else
                    @method('PATCH')
                @endif
                @csrf
                <div class="mb-3">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference', $article->reference) }}">
                    @if($errors->has('reference'))
                        <div class="text-danger">{{ $errors->first('reference') }}</div>
                    @endif
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $article->quantity) }}">


                    @if($errors->has('quantity'))
                    <div class="text-danger">{{ $errors->first('quantity') }}</div>
                    @endif

                    <label for="nota" class="form-label">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota" value="{{ old('nota', $article->nota) }}">

                    @if($errors->has('nota'))
                    <div class="text-danger">{{ $errors->first('nota') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
