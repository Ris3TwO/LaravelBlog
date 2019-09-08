<?php

namespace App;

use Carbon\Carbon;
use Modules\Admin\Entities\Photo;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'
    ];

    protected static function boot()
    {

        parent::boot();

        static::deleting(function($post){
            //Borrando categorías y tags asociados
            $post->categories()->detach();
            $post->tags()->detach();

            //Borrando fotos asociadas
            $post->photos->each->delete();
        });
    }

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

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        if ( auth()->user()->can('view', $this) )
        {
            return $query;
        }
        
        return $query->where('user_id', auth()->id());
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();
        
        $post = static::query()->create($attributes);

        $post->generateUrl();
        
        return $post;
    }

    public function generateUrl()
    {
        $url = str_slug($this->title);

        if ($this->whereUrl($url)->exists())
        {
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;
        $this->save();
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

    public function viewType($home = '')
    {
        if ($this->photos->count() === 1):
            return $home === 'home' ? 'posts.photo-link' : 'posts.photo';
        elseif ($this->photos->count() > 1):
            return $home === 'home' ? 'posts.carousel-link' : 'posts.carousel';
        elseif ($this->iframe):
            return $home === 'home' ? 'posts.iframe-link' : 'posts.iframe';
        else:
            return 'posts.text';
        endif;
    }

}
 