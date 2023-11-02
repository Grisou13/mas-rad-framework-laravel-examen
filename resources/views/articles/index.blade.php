@extends('layouts.app')

@section('content')
    <div class="row justify-content-between">
        <div class="col-4">
            <h1>Articles list</h1>
        </div>
        <div class="col-4 text-end">
            <a class="btn btn-primary" href="{{ route('articles.create') }}" role="button">New article</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reference</th>
                <th scope="col">Stock</th>
                <th scope="col">Nota</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->reference }}</td>
                <td>{{ $article->quantity }}</td>
                <td>{{ $article->nota }}</td>

                <td class="text-end">
                    <div class="d-inline-block">
                        <form method="POST" action="{{ route('articles.destroy', $article) }}">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-secondary" href="{{ route('articles.edit', $article) }}" role="button"><i class="bi bi-plus-lg"></i> Stock</a>
                            <a class="btn btn-secondary" href="{{ route('articles.edit', $article) }}" role="button">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th>{{ $articles->count() }} article(s)</th>
                <th>{{ $stockAmount }} article(s) in stock</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
@endsection
