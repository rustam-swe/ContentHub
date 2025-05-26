<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Content;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Resources\ModelResource;
use App\MoonShine\Resources\AuthorResource;
use App\MoonShine\Resources\GenreResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends DetailPage<ModelResource>
 */
class ContentDetailPage extends DetailPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make('ID', 'id')->sortable(),
            Text::make('Title', 'title'),
            Text::make('Description', 'description'),
            Text::make('Url', 'url'),
            BelongsToMany::make(
                'Authors',
                'authors',
                AuthorResource::class,
            ),
            BelongsToMany::make(
                'Genres',
                'genres',
                GenreResource::class,
            )
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
