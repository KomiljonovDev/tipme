<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $locale = app()->getLocale();

        $categories = News::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->get();

        $categories = $categories->map(function ($category) {
            $translation = $category->translations->first(); // First translation for the locale
            return [
                'id' => $category->id,
                'name' => $translation?->name ?? $category->name,
                'description' => $translation?->description ?? '',
            ];
        });

        return response()->json($categories);
    }
}
