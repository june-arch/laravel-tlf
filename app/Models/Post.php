<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'uuid', 'title', 'category', 'image', 'slug', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->hasOne(Detail::class);
    }
}
