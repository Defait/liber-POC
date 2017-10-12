<?php

namespace App\Http\Controllers;

use App\Information;
use App\Chapter;
use App\Series;
use App\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prefBookId = 0;

        $chapters = Chapter::where('created_at', '>', Chapter::getChapterDataForXDaysAgo(9))->orderBy('book_id', 'desc')->limit(40)->get();

        return view('chapter.index', compact('chapters', 'prefBookId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($seriesSlug, $bookSlug)
    {
        $URL = 'writers-hub/series/' . $seriesSlug . '/' . $bookSlug . '/store';

        $book = Book::where('slug', $bookSlug)->first();

        $number = $book->chapters->max('chapter_number');

        $newChapterNumber = $number + 1;

        return view('chapter.create', compact('URL', 'bookSlug', 'newChapterNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $seriesSlug, $bookSlug)
    {
        $owner = Book::where('slug', $bookSlug)->first()->user_id;

        if($owner ==! \Auth::user()->id)
        {
            return redirect('/');
        }

        Chapter::create([
            'title'          => $request->title,
            'body'           => $request->body,
            'chapter_number' => $request->chapter_number,
            'user_id'        => \Auth::user()->id,
            'book_id'        => Book::where('slug', $bookSlug)->first()->id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show($seriesSlug, $bookSlug, $chapterNumber)
    {
        $series = Series::where('slug', $seriesSlug)->first();
        
        $book = Book::where([['series_id', '=', $series->id], ['slug', '=', $bookSlug]])->first();

        $chapter = Chapter::where([['book_id', '=', $book->id],
                                      ['chapter_number', '=', $chapterNumber]])->first();

        return view('chapter.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
}
