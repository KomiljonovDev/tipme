<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegulatoryDocumentItem;

use MoonShine\Fields\File;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<RegulatoryDocumentItem>
 */
class RegulatoryDocumentItemResource extends ModelResource
{
    protected string $model = RegulatoryDocumentItem::class;

    protected string $title = 'RegulatoryDocumentItems';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name')->required(),
                BelongsTo::make('RegulatoryDocument')->required(),
                File::make('Document', 'document')
                    ->disk('public')
                    ->dir('documents')
                    ->allowedExtensions(['pdf', 'doc', 'docx', 'txt'])->required()
            ]),
        ];
    }

    /**
     * @param RegulatoryDocumentItem $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
