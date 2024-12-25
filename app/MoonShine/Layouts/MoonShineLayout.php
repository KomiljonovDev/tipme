<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\CategoryResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\CategoryTranslationResource;
use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\ActivityTranslationResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\NewsTranslationResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make('Categories', CategoryResource::class),
            MenuItem::make('CategoryTranslations', CategoryTranslationResource::class),
            MenuItem::make('Activities', ActivityResource::class),
            MenuItem::make('ActivityTranslations', ActivityTranslationResource::class),
            MenuItem::make('News', NewsResource::class),
            MenuItem::make('NewsTranslations', NewsTranslationResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
