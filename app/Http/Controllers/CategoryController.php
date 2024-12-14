<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Traits\MergerTranslationKey;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use MergerTranslationKey;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale();

        $categories = Category::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->get();

        return $categories->map(function ($category) {
            $translation = $category->translations->first();
            return [
                'id' => $category->id,
                'name' => $translation?->name,
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $locale = app()->getLocale();

        $category = Category::with([
            'news.translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            },
            'translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            },
        ])->findOrFail($category->id);

        $transformed = $category->toArray();

        // Merge category translations into the category itself
        $transformed = array_merge($transformed, $this->mergeTranslations($category->translations));

        // Merge news translations into each news item
        foreach ($transformed['news'] as &$news) {
            $news = array_merge($news, $this->mergeTranslations($news['translations']));
            unset($news['translations']); // Remove translations key from each news item
        }

        unset($transformed['translations']); // Remove translations key from category
        return $transformed;
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
