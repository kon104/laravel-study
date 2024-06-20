<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Log;
use Auth;


class BookController extends Controller
{

	public function __construct() {      //  added '__construct'
	}

	private function unauthView() {
		return redirect("/unauth");
	}

	public function index()
	{
		$books = Book::all();
		return view('book/index', compact('books'));
	}

	public function edit($id)
	{
		$book = Book::findOrFail($id);
//		$book = (Book::where('books.id', $id)->get())[0];
		return view('book/edit', compact('book'));
	}

	public function update(BookRequest $request, $id)
	{
		$book = Book::findOrFail($id);
		$book->name = $request->name;
		$book->price = $request->price;
		$book->author = $request->author;
		$book->save();
		return redirect("/book");
	}

	public function destroy($id)
	{
		$book = Book::findOrFail($id);
		$book->delete();
		return redirect("/book");
	}

	public function create()
	{
		// return an empty $book.
		$book = new Book();
		return view('book/create', compact('book'));
	}

	public function store(BookRequest $request)
	{
/*
		$validated = $request->validate([
			'name' => ['required', 'string', 'max:50'],
			'price' => ['required', 'integer'],
		]);
*/
		$book = new Book();
		$book->name = $request->name;
		$book->price = $request->price;
		$book->author = $request->author;
		$book->save();
		return redirect("/book");
	}

}
