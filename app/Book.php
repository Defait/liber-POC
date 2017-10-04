<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'slug', 'user_id', 'series_id',
    ];
            
    protected $hidden = [
        'visability_status',
    ];

    public function series()
    {
        return $this->belongsTo('App\Series');
    }

    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function information()
    {
        return $this->hasOne('App\Information');
    }

    public function getChaptersForBook($book_id)
    {
        $chapters = Chapter::where('book_id', $book_id)->get();

        return $chapters;
    }

    function getUserById($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }
}
