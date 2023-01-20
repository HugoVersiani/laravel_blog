<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_has_tags', 'post_id', 'tag_id');
    }

}
