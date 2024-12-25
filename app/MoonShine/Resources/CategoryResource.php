<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Resources\CategoryTranslationResource;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\HasMany;

class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    public static function label(): string
    {
        return 'Categories';
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                HasMany::make(label: 'Translated name', relationName: 'translations', resource: new CategoryTranslationResource()),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
