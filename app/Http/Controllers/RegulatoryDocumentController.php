<?php

namespace App\Http\Controllers;

use App\Models\RegulatoryDocument;
use Illuminate\Http\Request;

class RegulatoryDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale();

        $categories = RegulatoryDocument::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }, 'regulatory_document_items'])->get();

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
        //
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
