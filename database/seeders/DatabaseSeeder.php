<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;
use App\Models\RegulatoryDocument;
use App\Models\RegulatoryDocumentItem;
use App\Models\Activity;
use App\Models\CategoryTranslation;
use App\Models\NewsTranslation;
use App\Models\RegulatoryDocumentTranslation;
use App\Models\RegulatoryDocumentItemTranslation;
use App\Models\ActivityTranslation;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create news with translations
        News::factory()
            ->count(10) // Number of news items to create
            ->create()
            ->each(function ($news) {
                // Attach translations to the news item
                $news->translations()->saveMany([
                    new NewsTranslation(['locale' => 'en', 'title' => 'News Title EN', 'description' => 'Description EN']),
                    new NewsTranslation(['locale' => 'ru', 'title' => 'News Title RU', 'description' => 'Description RU']),
                    new NewsTranslation(['locale' => 'uz', 'title' => 'News Title UZ', 'description' => 'Description UZ']),
                ]);

                // Create a single category with translations
                $category = Category::factory()->create();
                $category->translations()->saveMany([
                    new CategoryTranslation(['locale' => 'en', 'name' => 'Category EN']),
                    new CategoryTranslation(['locale' => 'ru', 'name' => 'Category RU']),
                    new CategoryTranslation(['locale' => 'uz', 'name' => 'Category UZ']),
                ]);

                // Associate the category with the news item
                $news->category()->associate($category);
                $news->save();
            });



        // Create regulatory documents with translations
//        RegulatoryDocument::factory()
//            ->count(5) // Number of regulatory documents to create
//            ->create()
//            ->each(function ($regulatoryDocument) {
//                $regulatoryDocument->translations()->saveMany([
//                    new RegulatoryDocumentTranslation(['locale' => 'en', 'name' => 'Regulatory Document EN']),
//                    new RegulatoryDocumentTranslation(['locale' => 'ru', 'name' => 'Regulatory Document RU']),
//                    new RegulatoryDocumentTranslation(['locale' => 'uz', 'name' => 'Regulatory Document UZ']),
//                ]);
//            });
//
//        // Create regulatory document items with translations
//        RegulatoryDocumentItem::factory()
//            ->count(10) // Number of regulatory document items to create
//            ->create()
//            ->each(function ($regulatoryDocumentItem) {
//                $regulatoryDocumentItem->translations()->saveMany([
//                    new RegulatoryDocumentItemTranslation(['locale' => 'en', 'name' => 'Regulatory Item EN']),
//                    new RegulatoryDocumentItemTranslation(['locale' => 'ru', 'name' => 'Regulatory Item RU']),
//                    new RegulatoryDocumentItemTranslation(['locale' => 'uz', 'name' => 'Regulatory Item UZ']),
//                ]);
//            });
        RegulatoryDocumentItem::factory()
            ->count(10) // Number of news items to create
            ->create()
            ->each(function ($regulatoryDocumentItem) {
                // Attach translations to the news item
                $regulatoryDocumentItem->translations()->saveMany([
                    new RegulatoryDocumentItemTranslation(['locale' => 'en', 'name' => 'RegulatoryDocument Title EN']),
                    new RegulatoryDocumentItemTranslation(['locale' => 'ru', 'name' => 'RegulatoryDocument Title RU']),
                    new RegulatoryDocumentItemTranslation(['locale' => 'uz', 'name' => 'RegulatoryDocument Title UZ']),
                ]);

                // Create a single regulatoryDocument with translations
                $regulatoryDocument = RegulatoryDocument::factory()->create();
                $regulatoryDocument->translations()->saveMany([
                    new RegulatoryDocumentTranslation(['locale' => 'en', 'name' => 'RegulatoryDocument EN']),
                    new RegulatoryDocumentTranslation(['locale' => 'ru', 'name' => 'RegulatoryDocument RU']),
                    new RegulatoryDocumentTranslation(['locale' => 'uz', 'name' => 'RegulatoryDocument UZ']),
                ]);

                // Associate the regulatoryDocument with the news item
                $regulatoryDocumentItem->regulatoryDocument()->associate($regulatoryDocument);
                $regulatoryDocumentItem->save();
            });
//        // Create activities with translations
        Activity::factory()
            ->count(5) // Number of activities to create
            ->create()
            ->each(function ($activity) {
                $activity->translations()->saveMany([
                    new ActivityTranslation(['locale' => 'en', 'name' => 'Activity Name EN', 'description' => 'Activity Description EN']),
                    new ActivityTranslation(['locale' => 'ru', 'name' => 'Activity Name RU', 'description' => 'Activity Description RU']),
                    new ActivityTranslation(['locale' => 'uz', 'name' => 'Activity Name UZ', 'description' => 'Activity Description UZ']),
                ]);
            });
    }
}



