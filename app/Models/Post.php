<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends Model
{
    public $fillable = [
        'postable_type',
        'postable_id',
        'content',
        'user_id',
    ];

    public function postable(): MorphTo
    {
        return $this->morphTo();
    }
}
