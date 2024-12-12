<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_translations';

    protected $fillable = [
        'news_id',
        'locale',
        'title',
        'description',
    ];

    /**
     * Get the news item that owns the translation.
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
