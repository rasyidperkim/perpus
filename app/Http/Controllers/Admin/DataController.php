<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    public function authors(){

        $authors = Author::orderBy('name', 'ASC');
        
        return DataTables::eloquent($authors)
                ->addColumn('action', 'admin.author.action')
                ->addIndexColumn()
                ->toJson();
    }    
    
}
