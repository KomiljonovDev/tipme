<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $locale = app()->getLocale();

        $news = News::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->get();

        $news = $news->map(function ($category) {
            $translation = $category->translations->first(); // First translation for the locale
            return [
                'id' => $category->id,
                'title' => $translation?->title,
                'description' => $translation?->description ?? '',
            ];
        });

        return response()->json($news);
    }
}
