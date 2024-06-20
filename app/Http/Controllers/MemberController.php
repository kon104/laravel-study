<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Log;
use Auth;


class MemberController extends Controller
{

	public function __construct() {      //  added '__construct'
	}

	public function index()
	{
		$members = Member::all();
		return view('member/index', compact('members'));
	}

	public function edit($id)
	{
		$member = Member::findOrFail($id);
//		$book = (Book::where('books.id', $id)->get())[0];
		return view('member/edit', compact('member'));
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
		$member = new Member();
		return view('member/create', compact('member'));
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
