<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Content;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use App\MoonShine\Resources\AuthorResource;
use App\MoonShine\Resources\GenreResource;
use Throwable;


/**
 * @extends FormPage<ModelResource>
 */
class ContentFormPage extends FormPage
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
            Image::make('thumbnail', 'url')->canSee(function ($model) {
                return true;
            }),
            BelongsToMany::make('Authors', 'authors', AuthorResource::class),
            BelongsToMany::make('Genres', 'genres', GenreResource::class),
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
