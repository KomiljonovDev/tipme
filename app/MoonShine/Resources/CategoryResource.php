<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use App\MoonShine\Pages\Category\CategoryIndexPage;
use App\MoonShine\Pages\Category\CategoryFormPage;
use App\MoonShine\Pages\Category\CategoryDetailPage;

use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Fields\ID;

/**
 * @extends ModelResource<Category, CategoryIndexPage, CategoryFormPage, CategoryDetailPage>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Kategoriyalar';

    protected array $with = ['translations'];
    /**
     * @return list<Page>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make(),
            HasMany::make('Tarjimalar', 'translations', resource: CategoryTranslationResource::class)
            ->relatedLink(),
        ];
    }
    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }
    protected function formFields(): iterable
    {
        return [
            ID::make(),
            HasMany::make('Tarjimalar', 'translations', resource: CategoryTranslationResource::class)
                ->creatable(button: ActionButton::make("Til qo'shish", ''))
                ->relatedLink(),
        ];
    }
    protected function pages(): array
    {
        return [
            CategoryIndexPage::class,
            CategoryFormPage::class,
            CategoryDetailPage::class,
        ];
    }

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
