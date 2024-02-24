<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'description', 'tags', 'post_id',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
