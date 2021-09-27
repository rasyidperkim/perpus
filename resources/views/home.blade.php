@extends('frontend.templates.default')

@section('content')
<h4>Buku yang {{ Auth::user()->name }} Pinjam</h4>

@foreach ($books as $book)

<div class="card horizontal col s12 m6">
    {{-- <div class=" card-image"> --}}
    <img src="{{ $book->getCover() }}" width="200px">
    {{-- </div> --}}
    <div class=" card-stacked">
        <div class="card-content">
            <h4 class="red-text accent-1">{{ $book->title }}</h4>
            <blockquote>
                <p>{{ $book->description }}</p>
            </blockquote>
            <p><i class="material-icons">person</i> <b> Author : </b> {{ $book->author->name }}</p>
        </div>
        <div class="card-action">
            <a href="#" class="btn red accent-1 right waves-effect waves-light">Kembalikan Buku</a>
        </div>
    </div>
</div>
    
@endforeach
    
@endsection