<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'category_id',
        'stock',
        'description',
    ];

    // Relasi: satu buku punya satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: satu buku bisa dipinjam berkali-kali
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
