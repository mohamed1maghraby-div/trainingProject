<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use HasFactory, Sluggable, SearchableTrait;

    const PUBLIC = 1;
    const FRIENDS = 2;
    const SPECIFIC_FRIENDS = 3;
    const ONLY_ME = 4;

    protected $fillable = [
        'body',
        'status',
        'visibility',
        'user_id'
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function approved_comments(){
        return $this->hasMany(Comment::class)->whereStatus(1)->orderBy('id', 'desc');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function media(){
        return $this->hasMany(PostMedia::class);
    }
}
