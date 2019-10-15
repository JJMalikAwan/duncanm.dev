<?php

namespace App;

use GitDown\Facades\GitDown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'markdown', 'is_published', 'posted_on_dev_to'
    ];

    protected $casts = [
        'posted_on_dev_to' => 'boolean'
    ];

    public function getMarkdownAttribute()
    {
        return GitDown::parseAndCache($this->attributes['markdown']);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
