<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssPost extends Model
{
    use HasFactory;

    protected $fillable = ['guid', 'title', 'author', 'description', 'image', 'published_at'];
}
