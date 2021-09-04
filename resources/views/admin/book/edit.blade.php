@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Buku</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.book.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" placeholder="Masukkan Judul Buku" value="{{ old('title') ?? $book->title }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi tentang buku" rows="3">{{ $book->description ?? old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="form-group">
                    <label for="author_id" style="display:block;">Penulis</label>
                    <select name="author_id" id="" class="form-control select2">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                @if ($author->id === $book->author_id)
                                    selected
                                @endif
                            >
                            {{ $author->name }}
                            </option>                            
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cover">Sampul Buku</label>
                    <input type="file" name="cover" class="form-control" value="{{ $book->cover ?? old('cover') }}">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="qty">Jumlah Buku</label>
                    <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Masukkan Jumlah Buku" value="{{ $book->qty ?? old('qty') }}">
                    @error('qty')
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
