<?php

declare(strict_types=1);

namespace Gingerminds\LaravelCms\Repositories\Menu;

use Gingerminds\LaravelCms\Models\Menu\Menu;
use Gingerminds\LaravelCms\Resolver\ResourceResolver;
use Gingerminds\LaravelCore\Http\Requests\FormRequestInterface;
use Gingerminds\LaravelCore\Models\ResourceModelInterface;
use Gingerminds\LaravelCore\Repositories\AbstractRepository;
use Gingerminds\LaravelCore\Repositories\RepositoryInterface;
use Gingerminds\LaravelMultisite\Services\Context\SiteContext;
use InvalidArgumentException;

/**
 * @extends AbstractRepository<Menu>
 * @implements RepositoryInterface<Menu>
 */
class MenuRepository extends AbstractRepository implements RepositoryInterface
{
    public function getModelClass(): string
    {
        return ResourceResolver::model('menu');
    }

    public function update(
        ?FormRequestInterface $request,
        ResourceModelInterface $resourceModel
    ): ResourceModelInterface {
        if (!$resourceModel instanceof Menu) {
            throw new InvalidArgumentException(
                'ResourceModelInterface must be an instance of ' . Menu::class
            );
        }

        if (!$request instanceof FormRequestInterface) {
            return $resourceModel;
        }

        $resourceModel->fill($request->all());
        $resourceModel->site_id = app(SiteContext::class)->site()?->id;
        $resourceModel->save();

        return $resourceModel;
    }
}
