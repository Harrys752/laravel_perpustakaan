<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;

class StudentController extends Controller
{
    public function index()
    {
        $borrowCount = Borrow::where('user_id', auth()->id())->count();
        $bookCount = Book::count();

        return view('student.dashboard', compact('borrowCount', 'bookCount'));
    }
}
