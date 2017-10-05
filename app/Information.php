<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'author', 'synopsis', 'chapters', 'series_id', 'book_id', 'user_id', 'cover_img_location',
    ];

    protected $hidden = [
        'series_id', 'book_id', 'user_id',
    ];

    public function series()
    {
        return $this->hasOne('App\Series');
    }

    public function books()
    {
        return $this->hasOne('App\Book');
    }
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    function getUserById($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }
}
