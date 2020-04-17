<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        // echo '<pre>';
        // print_r($books);
        // echo '</pre>';

        $data = array();
        $data['books'] = $books;

        return view('books.index', $data);
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
        // success
        return redirect()
            ->action('BookController@index')
            ->with('message', '<div class="alert alert-success" role="alert">Book is created successfully!</div>');
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
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // set the book's data from the form data
        $book->title = $request->title;
        $book->description = $request->description;

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
            ->with('message', '<div class="alert alert-success" role="alert">Book is updated successfully!</div>');
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
        $book->delete();
        return redirect()
            ->action('BookController@index')
            ->with(
                'message',
                '<div class="alert alert-info" role="alert">Book is deleted successfully!</div>'
            );
    }
}
