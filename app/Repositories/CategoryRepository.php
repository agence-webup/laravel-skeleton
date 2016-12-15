<?php

namespace App\Repositories;

use App\Entities\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function allParent()
    {
        return Category::whereNull('category_id')->get();
    }

    public function allForSelect(array $exeptIds = [], $editMode = false)
    {
        $maxChild = config('catalog.category.max_childs');
        if ($editMode) {
            $maxChild++;
        }
        $categories = ['' => 'Aucune'];
        foreach (Category::all() as $key => $category) {
            if (!in_array($category->id, $exeptIds) && $category->level < $maxChild) {
                $categories[$category->id] = $category->title;
            }
        }
        return $categories;
    }

    public function get($id)
    {
        return Category::find($id);
    }

    public function delete(Category $category)
    {
        $category->delete();
    }

    public function save(Category $category)
    {
        $category->save();
    }
}
