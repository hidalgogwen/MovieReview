<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
    	'title',
    	'genre',
    	'director',
    	'producer',
    	'writer',
    	'casts',
    	'summary',
    	'release_date',
    	'image_path'
    ];

    public function review() {
        return $this->hasMany(Review::class);
    } 
}
