<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_Detail extends Model
{
    protected $table = 'news_detail';
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'brands_id',
        'image',
        'news_id',
        'date_news'
    ];
}
