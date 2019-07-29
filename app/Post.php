<?php

namespace App;

use Carbon\Carbon;
use Modules\Admin\Entities\Photo;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id',
    ];

    public function getRouteKeyName()
    {
        return 'url';
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function syncCategories($categories)
    {
        $categoryIds = collect($categories)->map(function($category){
            return Category::find($category) ? $category : Category::create(['name' => $category])->id;
        });

        return $this->categories()->sync($categoryIds);
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

}
 