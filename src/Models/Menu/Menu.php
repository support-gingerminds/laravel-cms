<?php

namespace Gingerminds\LaravelCms\Models\Menu;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Gingerminds\LaravelCms\ApiProvider\Menu\MenuProvider;
use Gingerminds\LaravelCms\Models\Menu\MenuItem\MenuItem;
use Gingerminds\LaravelCore\Models\ResourceModelInterface;
use Gingerminds\LaravelMultisite\Models\Site\SiteContextedModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\Serializer\Attribute\Groups;

/**
 * @property int<0, max>|null $site_id
 */
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => [Menu::GROUP_LIST]],
        ),
        new Get(
            normalizationContext: ['groups' => [Menu::GROUP_READ]],
        ),
    ],
    provider: MenuProvider::class,
)]
#[ApiProperty(
    identifier: true,
    property: 'id',
    serialize: new Groups([
        Menu::GROUP_LIST,
        Menu::GROUP_READ,
    ])
)]
#[ApiProperty(property: 'code', serialize: new Groups([
    Menu::GROUP_LIST,
    Menu::GROUP_READ,
]))]
#[ApiProperty(property: 'active_items', serialize: new Groups([
    Menu::GROUP_LIST,
    Menu::GROUP_READ,
]))]
class Menu extends Model implements ResourceModelInterface
{
    use SiteContextedModelTrait;

    public const string GROUP_LIST = 'menus:list';
    public const string GROUP_READ = 'menus:read';

    /**
     * @return string[]
     */
    public function getFillable(): array
    {
        return [
            'code',
            'site_id',
        ];
    }

    /**
     * @return HasMany<MenuItem, $this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('position');
    }

    /**
     * @return HasMany<MenuItem, $this>
     */
    public function activeItems(): HasMany
    {
        return $this
            ->hasMany(MenuItem::class)
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('position')
            ->with('children');
    }
}
