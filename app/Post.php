<?php

namespace App;

use Carbon\Carbon;
use GitDown\Facades\GitDown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopePublished(Builder $query)
    {
        $query
            ->whereNotNull('is_published')
            ->whereDate('is_published', '<=', now())
            ->orderBy('is_published', 'desc');
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->attributes['is_published'])->toFormattedDateString();
    }
}
