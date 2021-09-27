<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\BorrowHistory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(4);

        return view(
            'frontend.book.index',
            [
                'books' => $books,
            ]
        );
    }

    public function show(Book $book)
    {

        // dd($book);
        return view('frontend.book.show', [
            'book' => $book,
        ]);
    }

    public function borrow(Book $book)
    {
        // dd($book);
        // BorrowHistory::create([
        //     'user_id' => auth()->id(),
        //     'book_id' => $book->id,
        // ]);

        $user = auth()->user();

        if ($user->borrow()->where('books.id', $book->id)->count() > 0) {
            return redirect()->back()->with('toast', 'Kamu Hanya Boleh Pinjam Satu Buku !');
        }

        $user->borrow()->attach($book);
        $book->decrement('qty');

        return redirect()->back()->with('toast', 'Berhasil Meminjam Buku');
    }
}
