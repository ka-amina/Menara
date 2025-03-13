<?php

namespace App\Repositories;

use App\interfaces\CategoryInterface;
use App\Models\Category;
use Exception;

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
        try {
            return Category::all();
        } catch (Exception $e) {
            return response()->json(['error' => 'failed to fetch categories:' . $e->getMessage()], 500);
        }
    }

    public function getById($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'category not found: ' . $e->getMessage()], 404);
        }
    }

    public function create(array $data)
    {
        try {
            return Category::create($data);
        } catch (Exception $e) {
            return response()->json(['error' => 'faild to create category: ' . $e->getMessage()], 500);
        }
    }

    public function update($id, array $data)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($data);
            return $category;
        } catch (Exception $e) {
            return response()->json(['error' => 'faild to update category: ' . $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return $category;
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete category: ' . $e->getMessage()], 500);
        }
    }
}
