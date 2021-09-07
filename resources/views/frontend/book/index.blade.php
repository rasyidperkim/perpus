@extends('frontend.templates.default')

@section('content')
    <h2>Koleksi Buku</h2>
    <blockquote>
        <p class="flow-text">Koleksi Buku yang Bisa Baca Kamu Baca dan Pinjam</p>
    </blockquote>
    <div class="row">
        @foreach ($books as $book)
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

    {{ $books->links('vendor.pagination.materialize') }}

@endsection



{{-- @foreach ($books as $book)
    @if ($book->qty > 0)
        @include('frontend.templates.components.card-book', ['book' => $book])
    @endif
@endforeach --}}
