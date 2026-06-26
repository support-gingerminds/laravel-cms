<?php

declare(strict_types=1);

namespace Gingerminds\LaravelCms\Http\Request\Menu;

use Gingerminds\LaravelCore\Http\Requests\FormRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest implements FormRequestInterface
{
    /** @return  string[] */
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255',
        ];
    }
}
