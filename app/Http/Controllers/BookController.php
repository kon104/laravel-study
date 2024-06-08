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
//		$this->middleware('auth')->except(['index', 'show']);
//		$this->middleware('auth')->except(['index']);
	}

	private function unauthView() {
		$view = null;
		if (Auth::check() !== true) {
			$view = redirect("/hello");
		}
		return $view;
	}

	public function index()
	{
		$books = Book::all();
		return view('book/index', compact('books'));
	}

	public function edit($id)
	{
		$view = $this->unauthView();
		if (is_null($view)) {
			$book = Book::findOrFail($id);
//			$book = (Book::where('books.id', $id)->get())[0];
			$view = view('book/edit', compact('book'));
		}
		return $view;
	}

	public function update(BookRequest $request, $id)
	{
		$view = $this->unauthView();
		if (is_null($view)) {
			$book = Book::findOrFail($id);
			$book->name = $request->name;
			$book->price = $request->price;
			$book->author = $request->author;
			$book->save();
			$view = redirect("/book");
		}
		return $view;
	}

	public function destroy($id)
	{
		$view = $this->unauthView();
		if (is_null($view)) {
			$book = Book::findOrFail($id);
			$book->delete();
			$view = redirect("/book");
		}
		return $view;
	}

	public function create()
	{
		$view = $this->unauthView();
		if (is_null($view)) {
			// return an empty $book.
			$book = new Book();
			$view = view('book/create', compact('book'));
		}
		return $view;
	}

	public function store(BookRequest $request)
	{
		$view = $this->unauthView();
		if (is_null($view)) {
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
			$view = redirect("/book");
		}
		return $view;
	}



}
