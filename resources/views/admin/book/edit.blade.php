@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Buku</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.book.update', $book) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Masukkan Judul Buku"
                        value="{{ old('title') ?? $book->title }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" placeholder="Masukkan Nama Buku"
                        value="{{ old('description') ?? $book->description }}">
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>

@endsection
