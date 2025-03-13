<?php

namespace App\Repository;

use App\interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll()
    {
        return Category::all();
    }

    public function getById($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($category);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $category;
    }
}
