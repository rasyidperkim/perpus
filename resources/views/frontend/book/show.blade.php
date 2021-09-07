@extends('frontend.templates.default')

@section('content')
    <h4 class="center">Detail Buku</h4>
    <div class="col s12 m12" style="overflow: auto">
        <div class="card horizontal">
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
                    <p><i class="material-icons">book</i> <b> Stock : </b> {{ $book->qty }}</p>
                </div>
                <div class="card-action">
                    <a href="#" onclick="goBack()" class="btn blue accent-1 left waves-effect waves-light">Back</a>
                    <a href="#" class="btn red accent-1 right waves-effect waves-light">Pinjam Buku</a>
                </div>
            </div>
        </div>
    </div>

    <h6>Buku Lainnya dari Penulis {{ $book->author->name }}</h6>
    <div class="row">
        {{-- {{ dd($book->author->books) }} --}}
        @foreach ($book->author->books as $book)
            <div class="col s12 m6">
                <div class="card horizontal hoverable">
                    <div class=" card-image">
                        <img src="{{ $book->getCover() }}" height="200px" width="150px">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5>
                                <a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a>
                            </h5>
                            <p>{{ Str::limit($book->description, 50, '...') }}</p>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn red accent-1 right waves-effect waves-light">Pinjam Buku</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
