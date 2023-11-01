@extends('layouts.app')

@section('content')
    <h1>New article</h1>
    <div class="row justify-content-between">
        <div class="col-4">
            <form action="{{ route('articles.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference') }}">
                    @if($errors->has('reference'))
                        <div class="text-danger">{{ $errors->first('reference') }}</div>
                    @endif                    
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                    @if($errors->has('quantity'))
                        <div class="text-danger">{{ $errors->first('quantity') }}</div>
                    @endif                          
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection