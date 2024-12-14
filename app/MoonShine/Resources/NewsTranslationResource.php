<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\NewsTranslation;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<NewsTranslation>
 */
class NewsTranslationResource extends ModelResource
{
    protected string $model = NewsTranslation::class;

    protected string $title = 'News Translations';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Locale', 'locale')->required(), // Language Code
                Text::make('Title', 'title')->required(),
                Textarea::make('Description', 'description')->required(),
            ]),
        ];
    }

    /**
     * @param NewsTranslation $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'locale' => ['required', 'string', 'max:5'], // Example: 'en', 'ru', 'uz'
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }
}
