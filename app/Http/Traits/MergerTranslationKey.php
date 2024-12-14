<?php

namespace App\Http\Traits;

trait MergerTranslationKey {
    protected function mergeTranslations($translations)
    {
        // Ensure $translations is a collection if it's not already one
        if (is_array($translations)) {
            $translations = collect($translations); // Convert array to collection
        }

        $result = [];
        foreach ($translations as $translation) {
            // Check if $translation is an object (Eloquent model) and convert to array if necessary
            if (is_object($translation)) {
                $result = array_merge($result, $translation->toArray());
            } else {
                $result = array_merge($result, (array) $translation); // In case it's already an array
            }
        }
        return $result;
    }
}
