<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable =[
        'title', 'url', 'description'
    ];

    protected $with = ['tags'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
