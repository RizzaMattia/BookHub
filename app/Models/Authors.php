<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    protected $fillable = ['id', 'name', 'birthday'];

    public function books() : HasMany{
        return $this->hasMany(Books::class);
    }
}
