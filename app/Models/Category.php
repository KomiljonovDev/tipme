<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public $translatedAttributes = ['name'];
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function translationByLocale($locale)
    {
        return $this->translations()->where('locale', $locale);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
