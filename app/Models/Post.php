<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute()
    {
        return asset("storage/$this->cover");
    }
}
