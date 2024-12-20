<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\RegulatoryDocumentItemResource;
use App\MoonShine\Resources\RegulatoryDocumentResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuItem;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make(
                static fn() => __("Kategoriyalar"),
                new CategoryResource()
            ),
            MenuItem::make(
                static fn() => __('Yangiliklar'),
                new NewsResource()
            ),
            MenuItem::make(
                static fn() => __("Me'yoriy hujjatlar menyusi"),
                new RegulatoryDocumentResource()
            ),
            MenuItem::make(
                static fn() => __("Me'yoriy hujjatlar"),
                new RegulatoryDocumentItemResource()
            ),
            MenuItem::make(
                static fn() => __("Faoliyatlar"),
                new ActivityResource()
            ),

            MenuItem::make('Documentation', 'https://moonshine-laravel.com/docs')
                ->badge(fn() => 'Check')
                ->blank(),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
