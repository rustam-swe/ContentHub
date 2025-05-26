<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\MoonShine\Pages\Genre\GenreIndexPage;
use App\MoonShine\Pages\Genre\GenreFormPage;
use App\MoonShine\Pages\Genre\GenreDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Genre, GenreIndexPage, GenreFormPage, GenreDetailPage>
 */
class GenreResource extends ModelResource
{
    protected string $model = Genre::class;

    protected string $title = 'Genres';

    protected string $column = 'name';

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            GenreIndexPage::class,
            GenreFormPage::class,
            GenreDetailPage::class,
        ];
    }

    /**
     * @param Genre $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
