<?php

declare(strict_types=1);

namespace Gingerminds\LaravelCms\ApiProvider\Menu;

use ApiPlatform\State\ProviderInterface;
use Gingerminds\LaravelCms\Models\Menu\Menu;
use Gingerminds\LaravelCms\Repositories\Menu\MenuRepository;
use Gingerminds\LaravelCore\ApiProvider\AbstractApiProvider;
use Gingerminds\LaravelCore\ApiProvider\ApiProviderInterface;

/**
 * @implements ProviderInterface<Menu>
 */
class MenuProvider extends AbstractApiProvider implements ProviderInterface, ApiProviderInterface
{
    public function __construct(MenuRepository $repository)
    {
        parent::__construct($repository);
    }
}
