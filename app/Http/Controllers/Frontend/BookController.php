<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(2);

        return view(
            'frontend.book.index',
            [
                'books' => $books,
            ]
        );
    }
}
