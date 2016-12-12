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

    public function allForSelect(array $exeptIds = [])
    {
        $categories = ['' => 'Aucune'];
        foreach (Category::all() as $key => $category) {
            if (!in_array($category->id, $exeptIds)) {
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
