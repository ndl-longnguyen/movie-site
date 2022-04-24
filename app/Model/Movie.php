<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'director', 'performer', 'category', 'premiere', 'time', 'image', 'view', 'video'
    ];

    /**
     * Get the comments for the Movie.
     */
    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }
}