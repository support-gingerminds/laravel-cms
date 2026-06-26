<?php

declare(strict_types=1);

namespace Gingerminds\LaravelCms\Models\Menu\MenuItem;

use Gingerminds\LaravelMultisite\Models\Trait\TranslationModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $url
 * @property string $description
 */
class MenuItemTranslation extends Model
{
    use TranslationModelTrait;

    /**
     * @return string[]
     */
    public function getFillable(): array
    {
        return [
            'name',
            'url',
            'description',
            'language_id',
        ];
    }
}
