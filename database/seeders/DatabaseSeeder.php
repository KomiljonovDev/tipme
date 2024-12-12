<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\News;
use App\Models\RegulatoryDocumentItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        RegulatoryDocumentItem::factory()->create();
        News::factory()->create();
        Activity::factory()->create();
    }
}
