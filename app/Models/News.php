<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    public function category () {
        return $this->belongsTo(Category::class);
    }
    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }
}
