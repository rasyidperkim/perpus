@extends('frontend.templates.default')

@section('content')
    <h2>Koleksi Buku</h2>
    <blockquote>
        <p class="flow-text">Koleksi Buku yang Bisa Baca Kamu Baca dan Pinjam</p>
    </blockquote>
    <div class="row">
        @foreach ($books as $book)
            @include('frontend.templates.components.card-book', ['book'=>$book])
        @endforeach
    </div>

    {{ $books->links('vendor.pagination.materialize') }}

@endsection



{{-- @foreach ($books as $book)
    @if ($book->qty > 0)
        @include('frontend.templates.components.card-book', ['book' => $book])
    @endif
@endforeach --}}
