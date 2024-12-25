<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryTranslation;

use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;

/**
 * @extends ModelResource<CategoryTranslation>
 */
class CategoryTranslationResource extends ModelResource
{
    protected string $model = CategoryTranslation::class;

    protected string $title = 'Category Translations';

    public static function label(): string
    {
        return 'Translations';
    }

    /**
     * @return array
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Locale', 'locale')->required(),
            ]),
        ];
    }

    /**
     * @param CategoryTranslation $item
     * @return array
     */
    public function rules(Model $item): array
    {
        return [
            'locale' => 'required|string|max:5',
            'name' => 'required|string|max:255',
        ];
    }
}
