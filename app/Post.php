<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'markdown', 'is_published', 'posted_on_dev_to'
    ];

    protected $casts = [
        'posted_on_dev_to' => 'boolean'
    ];
}
