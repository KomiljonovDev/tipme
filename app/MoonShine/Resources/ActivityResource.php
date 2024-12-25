<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Activity;
use App\MoonShine\Pages\Activity\ActivityIndexPage;
use App\MoonShine\Pages\Activity\ActivityFormPage;
use App\MoonShine\Pages\Activity\ActivityDetailPage;

use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Fields\ID;

/**
 * @extends ModelResource<Activity, ActivityIndexPage, ActivityFormPage, ActivityDetailPage>
 */
class ActivityResource extends ModelResource
{
    protected string $model = Activity::class;

    protected string $title = 'Aktivitetlar';

    /**
     * @return list<Page>
     */
    protected function indexFields (): iterable {
        return [
            ID::make(),
            HasMany::make('Tarjimalar', 'translations', resource: ActivityTranslationResource::class)
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
            HasMany::make('Tarjimalar', 'translations', resource: ActivityTranslationResource::class)
                ->creatable(button: ActionButton::make("Til qo'shish", ''))
        ];
    }
    protected function pages(): array
    {
        return [
            ActivityIndexPage::class,
            ActivityFormPage::class,
            ActivityDetailPage::class,
        ];
    }

    /**
     * @param Activity $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
