<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book', 'user')->get();
        return view('admin.borrows.index', compact('borrows'));
    }

    public function borrow(Book $book)
    {
        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'return_date' => null,
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function myBorrows()
    {
        $borrows = Borrow::with('book')
            ->where('user_id', Auth::id())
            ->get();

        return view('student.borrows.index', compact('borrows'));
    }

    public function returnBook(Borrow $borrow)
    {
        if ($borrow->user_id == Auth::id()) {
            $borrow->update([
                'return_date' => now(),
                'status' => 'dikembalikan'
            ]);
        }

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('admin.borrows.index')->with('success', 'Data peminjaman dihapus!');
    }
}
