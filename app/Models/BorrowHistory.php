<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    use HasFactory;

    protected $table = "borrow_history";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }
}
