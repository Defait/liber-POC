<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'user_id'
    ];
    
    protected $hidden = [
        'visability_status',
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function information()
    {
        return $this->hasOne('App\Information');
    }

    public function getBooks($series_id)
    {
        $books = Book::where('series_id', $series_id)->get();

        return $books;
    }

    public function getChaptersForBooks($series_id)
    {
        $chapters = array();

        $books = $this->getBooks($series_id);

        foreach($books as $book)
        {
            $chapters[] = Chapter::where('book_id', $book->id)->get();
        }

        return $chapters;
    }

    public function countChaptersForBooks($series_id)
    {
        $count = 0;

        $books = $this->getBooks($series_id);

        foreach($books as $book)
        {
            $count = $count + Chapter::where('book_id', $book->id)->count();
        }

        return $count;
    }    

    // Because of visability I need to check "manually"
    function checkIfUnique($data)
    {
        $series = Series::where('name', $data->name)->first();
        if($series)
        {
            if($series->visability_status ==! 0)
            {
                return false;
            }
            else {
                return true;
            }
        }

    }

    public function getSeriesId($slug)
    {
        $series_id = Series::where('slug', $slug)->first()->id;

        return $series_id;
    }
    
}
