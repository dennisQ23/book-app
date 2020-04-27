<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'search']]);
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        $data = array();
        $data['books'] = $books;
        $data['genres'] = Genre::all();
        return view('books.index', $data);
    }

    public function search(Request $request)
    {
        // retrieve query from URL
        $q = $request->q;
        // SQL LIKE format for matching on search query:
        // %SEARCH_TERM%
        $q_query = '%' . $q . '%';
        $books = Book::where('title', 'LIKE', $q_query)
            ->orWhere('description', 'LIKE', $q_query)
            ->get();

        return view('books.search', ['q' => $q, 'books' => $books, 'genres' => Genre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $data = array();
        $data['book'] = $book;
        // <select><option value=VALUE>TEXT</option> </select>
        // [VALUE => TEXT, VALUE => TEXT]
        // <option value="1">Mystery</option>
        // <option value="2">Programming</option>
        $data['genres'] = Genre::get()->pluck('name', 'id');

        // echo '<pre>';
        // print_r($data['genres']);
        // echo '</pre>';
        // exit;


        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $book = new Book;

        // set the book's data from the form data
        $book->title = $request->title;
        $book->description = $request->description;
        $book->user_id = Auth::user()->id;

        $book->save();

        // create the new book in the database
        // if (!$book->save()) {
        //     $errors = $book->getErrors();

        //     //redirect back to the create page
        //     // and pass along the errors
        //     return redirect()
        //         ->action('BookController@create')
        //         ->with('errors', $errors)
        //         ->withInput();
        // }

        // esablish genre relationship
        $book->genres()->sync($request->genre_id);
        // success
        return redirect()
            ->action('BookController@index')
            ->with('success', 'Book is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
        $book = Book::findOrFail($id);
        $data['book'] = $book;
        return view('books/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        if (!$book->canEdit()) {
            abort('403', 'Not authorized');
        }

        $genres = Genre::get()->pluck('name', 'id');
        return view('books.edit', ['book' => $book, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        if (!$book->canEdit()) {
            abort('403', 'Not authorized');
        }

        // set the book's data from the form data
        $book->title = $request->title;
        $book->description = $request->description;
        $book->genres()->sync($request->genre_id);
        $book->save();

        // update the new book in the database
        // if (!$book->save()) {
        //     $errors = $book->getErrors();

        //     //redirect back to the edit page
        //     // and pass along the errors
        //     return redirect()
        //         ->action('BookController@edit', $book->id)
        //         ->with('errors', $errors)
        //         ->withInput();
        // }

        // success
        return redirect()
            ->action('BookController@index')
            ->with('success', 'Book is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if (!$book->canEdit()) {
            abort('403', 'Not authorized');
        }

        $book->delete();
        return redirect()
            ->action('BookController@index')
            ->with(
                'success',
                'Book is deleted successfully!'
            );
    }
}
