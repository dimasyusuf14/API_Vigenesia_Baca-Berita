<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute()
    {
        return (Storage::disk('public')->exists("cover/{$this->cover}"))
            ? asset("storage/cover/{$this->cover}")
            : asset("storage/cover/default.jpg");
    }
}
