<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\CategoryTranslationResource;
use App\MoonShine\Resources\ActivityResource;
use App\MoonShine\Resources\ActivityTranslationResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\NewsTranslationResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                CategoryResource::class,
                CategoryTranslationResource::class,
                ActivityResource::class,
                ActivityTranslationResource::class,
                NewsResource::class,
                NewsTranslationResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
