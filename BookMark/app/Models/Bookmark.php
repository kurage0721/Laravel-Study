<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable =[
        'title', 'url', 'description'
    ];

    public function tags()
    {
        return $this->belongToMany(Tag::class);
    }
}
