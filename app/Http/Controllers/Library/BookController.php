<?php

namespace App\Http\Controllers\Library;
use App\Http\Controllers\Controller;

use App\Models\Library\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
   
    public function books()
    {
        $books = Book::all();
        return view('library.view_book',compact('books')); 
    }

    public function bookCreate()
    {
        return view('library.create_book');
    }

    public function bookInsert(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'bookno' => 'required',
            'isbnno' => 'required', 
            'publisher' => 'required',
            'author' => 'required',
            'subject' => 'required',
            'rackno' => 'required',
            'qty' => 'required',
            'available' => 'required',
            'price' => 'required',
            'postdate' => 'required',
            'description' => 'required',
        ]);
        // dd($request->all());
        $books = Book::create([
            'title'        => $request->input('title'),
            'bookno'       => $request->input('bookno'),
            'isbnno'       => $request->input('isbnno'),
            'publisher'    => $request->input('publisher'), 
            'author'       => $request->input('author'), 
            'subject'      => $request->input('subject'), 
            'rackno'       => $request->input('rackno'), 
            'qty'          => $request->input('qty'), 
            'available'    => $request->input('available'), 
            'price'        => $request->input('price'), 
            'postdate'     => $request->input('postdate'), 
            'description'  => $request->input('description'), 
        ]);

        return redirect()->route('books');
    }

    public function bookEdit($id)
    {
        $books = Book::find($id);
        return view('library.create_book', compact('books'));
    }

    public function bookUpdate(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'bookno' => 'required',
            'isbnno' => 'required', 
            'publisher' => 'required',
            'author' => 'required',
            'subject' => 'required',
            'rackno' => 'required',
            'qty' => 'required',
            'available' => 'required',
            'price' => 'required',
            'postdate' => 'required',
            'description' => 'required',
        ]);
        $books = Book::find($id);
        $books->update([
            'title'        => $request->input('title'),
            'bookno'       => $request->input('bookno'),
            'isbnno'       => $request->input('isbnno'),
            'publisher'    => $request->input('publisher'), 
            'author'       => $request->input('author'), 
            'subject'      => $request->input('subject'), 
            'rackno'       => $request->input('rackno'), 
            'qty'          => $request->input('qty'), 
            'available'    => $request->input('available'), 
            'price'        => $request->input('price'), 
            'postdate'     => $request->input('postdate'), 
            'description'  => $request->input('description'), 
        ]);

        return redirect()->route('books');
    }

    public function bookDestroy($id)
    {
        $books = Book::find($id);
        $books->delete();
        return redirect()->back();
    }

    public function getQty(Request $request)
    {
        $bookname = $request->input('book');
        $availableQty = Book::where('title', $bookname)->pluck('available')->first();
        if ($availableQty !== null) {
            return response()->json(['qty' => $availableQty]);
        }
    }

}
