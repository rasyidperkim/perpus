<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index', [
            'title' => 'Data Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', [
            'title' => 'Tambah Data Buku',
            'authors' => Author::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:20',
            'author_id' => 'required',
            'cover' => 'file|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'qty' => 'required|numeric',
        ]);

        $cover = null;

        if ($request->hasFile('cover')){
            $imgName = time() . '-' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('assets/covers', $imgName);
                        
        }

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'cover' => $cover,
            'qty' => $request->qty,
        ]);

        return redirect()->route('admin.book.index')
                            ->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'title' => 'Ubah Data Buku',
            'authors' => Author::orderBy('name', 'ASC')->get(),
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:20',
            'author_id' => 'required',
            'cover' => 'file|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'qty' => 'required|numeric',
        ]);
        
        $cover = $book->cover;

        if ($request->hasFile('cover')){
            Storage::delete($book->cover);
            $imgName = time() . '-' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('assets/covers', $imgName);
                        
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'cover' => $cover,
            'qty' => $request->qty,
        ]);

        return redirect()->route('admin.book.index')
                            ->with('info', 'Data Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        
        return redirect()->route('admin.book.index')
                            ->with('danger', 'Data Buku Berhasil Dihapus');
    }
}
