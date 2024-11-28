<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Books extends Model
{
    protected $fillable = ['id', 'title', 'description', 'pages', 'cover_image','author_id', 'category_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Authors::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
