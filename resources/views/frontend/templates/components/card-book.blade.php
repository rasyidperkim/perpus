<div class="col s12 m6">
    <div class="card horizontal hoverable"  style="height: 250px">
        <div class=" card-image">
            <img src="{{ $book->getCover() }}" height="250px" width="150px">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <h5>
                    <a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a>
                </h5>
                <p>{{ Str::limit($book->description, 50, '...') }}</p>
            </div>
            <div class="card-action">
                <form action="{{ route('book.borrow', $book) }}" method="post">
                    @csrf

                    <input type="submit" value="Pinjam Buku"
                        class="btn red accent-1 right waves-effect waves-light">
                </form>
            </div>
        </div>
    </div>
</div>