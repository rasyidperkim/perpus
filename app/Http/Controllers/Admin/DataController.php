<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    public function authors()
    {

        $authors = Author::orderBy('name', 'ASC');

        return DataTables::eloquent($authors)
            ->addColumn('action', 'admin.author.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function books()
    {


        $books = Book::orderBy('title', 'ASC');

        return DataTables::eloquent($books)
            ->addColumn('author', function (Book $model) {
                return $model->author->name;
            })
            ->editColumn('cover', function (Book $model) {
                return '<center><img src="' . $model->getCover() . '" height="150px" width="100%" /></center>';
            })
            ->addColumn('action', 'admin.book.action')
            ->addIndexColumn()
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }

    public function borrows()
    {

        $borrows = BorrowHistory::whereNull('returned_at')->latest();

        return DataTables::eloquent($borrows)
            ->addColumn('user', function (BorrowHistory $model) {
                return $model->user->name;
            })
            ->addColumn('book_title', function (BorrowHistory $model) {
                return $model->book->title;
            })
            ->addColumn('action', 'admin.borrow.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
