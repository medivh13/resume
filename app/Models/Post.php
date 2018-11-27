<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';
	protected $fillable = [
        'title',
        'body',
        'slug',
        // 'user_id',
        'category_id',
        // 'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($post) {
        //     if(is_null($post->user_id)) {
        //         $post->user_id = auth()->user()->id;
        //     }
        // });

        static::deleting(function ($post) {
            $post->comments()->delete();
            $post->tags()->detach();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //milik sebuah category
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); //milik banyak tag
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); //milik banyak comment
    }
}
