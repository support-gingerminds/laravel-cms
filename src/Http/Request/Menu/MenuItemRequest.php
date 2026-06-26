<?php

declare(strict_types=1);

namespace Gingerminds\LaravelCms\Http\Request\Menu;

use Gingerminds\LaravelCore\Http\Requests\FormRequestInterface;
use Illuminate\Foundation\Http\FormRequest;

class MenuItemRequest extends FormRequest implements FormRequestInterface
{
    /** @return array<string, list<string>|string> */
    public function rules(): array
    {
        $rules = [
            'code'            => 'required|string|max:255',
            'parent_id'       => 'nullable|integer|exists:menu_items,id',
            'is_active'       => 'required|boolean',
            'position'        => 'required|integer|min:0',
            'is_target_blank' => 'required|boolean',
            'is_no_referrer'  => 'required|boolean',
            'is_no_opener'    => 'required|boolean',
            'translations'    => 'required|array',
        ];

        foreach ($this->input('translations', []) as $langId => $fields) {
            foreach ($fields as $field => $value) {
                $rules["translations.$langId.$field"] = ['nullable'];
            }
        }

        return $rules;
    }
}
