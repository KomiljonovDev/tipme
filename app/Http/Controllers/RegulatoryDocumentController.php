<?php

namespace App\Http\Controllers;

use App\Http\Traits\MergerTranslationKey;
use App\Models\RegulatoryDocument;
use Illuminate\Http\Request;

class RegulatoryDocumentController extends Controller
{
    use MergerTranslationKey;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale();

        $regulatoryDocument = RegulatoryDocument::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->get();
        $regulatoryDocument = $regulatoryDocument->map(function ($category) {
            $translation = $category->translations->first(); // First translation for the locale
            return [
                'id' => $category->id,
                'name' => $translation?->name ?? $category->name,
            ];
        });

        return response()->json($regulatoryDocument);
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
    public function show(RegulatoryDocument $regulatoryDocument)
    {
        $locale = app()->getLocale();

        $regulatoryDocument = RegulatoryDocument::with([
            'regulatory_document_items.translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            },
            'translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            },
        ])->findOrFail($regulatoryDocument->id);

        $transformed = $regulatoryDocument->toArray();

        // Merge regulatoryDocument translations into the regulatoryDocument itself
        $transformed = array_merge($transformed, $this->mergeTranslations($regulatoryDocument->translations));

        // Merge news translations into each news item
        foreach ($transformed['regulatory_document_items'] as &$news) {
            $news = array_merge($news, $this->mergeTranslations($news['translations']));
            unset($news['translations']); // Remove translations key from each news item
        }

        unset($transformed['translations']); // Remove translations key from regulatoryDocument
        return $transformed;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegulatoryDocument $regulatoryDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegulatoryDocument $regulatoryDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegulatoryDocument $regulatoryDocument)
    {
        //
    }
}
