<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id','book_id', 'chapter_number'
    ];
    
    protected $hidden = [
        'visability_status',
    ];
    
    public function books()
    {
        return $this->belongsTo('App\Book');
    }
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    function getAllChaptersSortedByBook()
    {
        $chapters = DB::table('chapters')->orderBy('book_id', 'desc');
    }

    function getBookObject($id)
    {
        $book = Book::findOrFail($id);

        return $book;
    }

    function getSeriesObject($id)
    {
        $series = Series::findOrFail($id);

        return $series;
    }

    function getSeriesObjectThroughBook($book_id)
    {
        $series = $this->getSeriesObject($this->getBookObject($book_id)->series_id);

        return $series;
    }

    function getNextChapter($chapter)
    {
        $nextChapter = Chapter::where([['book_id', '=', $chapter->book_id], ['chapter_number', '>', $chapter->chapter_number]])->orderBy('chapter_number', 'asc')->first();

        return $nextChapter;
    }

    function getPreviousChapter($chapter)
    {
        $prevChapter = Chapter::where([['book_id', '=', $chapter->book_id], ['chapter_number', '<', $chapter->chapter_number]])->orderBy('chapter_number', 'desc')->first();
        
        return $prevChapter;
    }

    public static function getChapterDataForXDaysAgo($days)
    {
        $date = date('Y-m-d', strtotime('-'. $days . ' days', time()));

        return $date;
    }

}
