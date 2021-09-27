<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        return view('admin.borrow.index');
    }

    public function returnBook(Request $request, BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'returned_at' => Carbon::now(),
            'admin_id' => auth()->id(),
        ]);

        return redirect()->back()->withSuccess('Buku Dikembalikan');
    }
}
