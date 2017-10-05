<?php

namespace App\Http\Controllers;

use App\Series;
use App\Book;
use App\Information;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $URL = 'creator-hub/series/' . $slug . '/store';

        return view('book.create', compact('URL'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $book = new Book;

        $owner = Series::where('slug', $slug)->first()->id;

        if($owner ==! \Auth::user()->id)
        {
            return redirect('/');
        }

        Book::create([
            'title'     => $request->title,
            'slug'      => str_slug($request->title),
            'user_id'   => \Auth::user()->id,
            'series_id' => Series::where('slug', $slug)->first()->id,
        ]);
        
        if($request->synopsis)
        {
            $this->storeInformation($request);
        }
        
        return redirect('/');
    }

    public function storeInformation($data)
    {
        Information::create([
            'author'             => $data->author,
            'synopsis'           => $data->synopsis,
            'cover_img_location' => 'img/wukong.jpg',
            'book_id'            => Book::where('slug', str_slug($data->title))->first()->id,
            'user_id'            => \Auth::user()->id,
        ]);

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($seriesSlug, $bookSlug)
    {
        $series = Series::where('slug', $seriesSlug)->first();

        $book = Book::where([['series_id', '=', $series->id],
                            ['slug', '=', $bookSlug]])->first();

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
