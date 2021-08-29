@extends('admin.templates.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Penulis</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.author.update', $author) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Masukkan Nama Penulis"
                        value="{{ old('name') ?? $author->name }}">
                    @error('name')
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
