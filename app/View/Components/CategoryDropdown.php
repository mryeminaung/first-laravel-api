<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public $categories;
    public $tag;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::all();
        $this->tag = $this->getTag();
    }

    public function getTag()
    {
        if (request(['category'])) {
            $category = Category::where('slug', request('category'))->first();

            return $category->name;
        } else {
            return null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.category-dropdown',
            [
                'categories' => $this->categories,
                'tag' => $this->tag
            ]
        );
    }
}
