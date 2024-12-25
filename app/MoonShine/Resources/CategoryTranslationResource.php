<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryTranslation;
use App\MoonShine\Pages\CategoryTranslation\CategoryTranslationIndexPage;
use App\MoonShine\Pages\CategoryTranslation\CategoryTranslationFormPage;
use App\MoonShine\Pages\CategoryTranslation\CategoryTranslationDetailPage;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<CategoryTranslation, CategoryTranslationIndexPage, CategoryTranslationFormPage, CategoryTranslationDetailPage>
 */
class CategoryTranslationResource extends ModelResource
{
    protected string $model = CategoryTranslation::class;

    protected string $title = 'CategoryTranslations';

    /**
     * @return list<Page>
     */
    protected function indexFields(): iterable
    {
        return [
            Text::make('locale'),
            Text::make('name'),
        ];
    }
    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }
    protected function formFields(): iterable
    {
        return [
            Text::make('locale'),
            Text::make('name'),
            BelongsTo::make('Category', 'category', resource: CategoryResource::class),
        ];
    }
    protected function pages(): array
    {
        return [
            CategoryTranslationIndexPage::class,
            CategoryTranslationFormPage::class,
            CategoryTranslationDetailPage::class,
        ];
    }

    /**
     * @param CategoryTranslation $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
