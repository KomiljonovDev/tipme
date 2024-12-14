<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\ID;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Activity>
 */
class ActivityResource extends ModelResource
{
    protected string $model = Activity::class;

    protected string $title = 'Activities';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                // Multilingual Name Field
                Json::make('Name', 'name')
                    ->fields([
                        Text::make('English', 'en')->required(),
                        Text::make('Russian', 'ru')->required(),
                        Text::make('Uzbek', 'uz')->required(),
                    ])
                    ->required(),

                // Multilingual Description Field
                Json::make('Description', 'description')
                    ->fields([
                        Textarea::make('English', 'en')->required(),
                        Textarea::make('Russian', 'ru')->required(),
                        Textarea::make('Uzbek', 'uz')->required(),
                    ])
                    ->required(),
            ]),
        ];
    }

    /**
     * @param Activity $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name_en' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'name_uz' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_ru' => ['required', 'string'],
            'description_uz' => ['required', 'string'],
        ];
    }
}
