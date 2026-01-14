<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 protected $fillable = [
        'title',
        'excerpt',
        'content',
        'image_main',
        'image_2',
        'image_3',
        'slug',
        'published',
        'category_id',
      
    ];
public function category()
{
    return $this->belongsTo(Category::class);
}
}
