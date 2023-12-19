<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return BookResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
        $book = Book::create([
            'title' => $request->title . " " . rand(0, 500),
            'description' => $request->description,
            'publication_year' => $request->publication_year,
            'author_id' => $request->author_id,
        ]);

        return new BookResource($book);

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'publication_year' => $request->publication_year,
            'author_id' => $request->author_id,
        ]);

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response('Deleted Successfully', 200);

    }
}
