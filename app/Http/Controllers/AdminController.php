<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Borrow;

class AdminController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $studentCount = User::where('role', 'siswa')->count();
        $borrowCount = Borrow::count();

        return view('admin.dashboard', compact('bookCount', 'categoryCount', 'studentCount', 'borrowCount'));
    }
}
