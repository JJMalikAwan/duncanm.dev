<?php

namespace App;

use Carbon\Carbon;
use GitDown\Facades\GitDown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
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

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary(strip_tags($this->markdown))
            ->updated($this->updated_at)
            ->link(route('posts.show', ['post' => $this]))
            ->author('Duncan McClean');
    }

    public static function getFeedItems()
    {
        return Post::published()->get();
    }

    public function summary()
    {
        return substr(strip_tags($this->attributes['markdown']), 0, 290).'...';
    }
}
