<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\interfaces\CategoryInterface;
use Exception;

class CategoryController extends Controller
{

    public $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = $this->categoryInterface->getAll();
            return view('Admin.categories.index', compact('categories'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error fetching categories: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $this->categoryInterface->create($data);
            return redirect()->back()->with('success', 'Category created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to create category: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->categoryInterface->getById($category->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.categories.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
        $data = $request->validated();
        $result = $this->categoryInterface->update($category->id, $data);
        // dd($result);
        return redirect()->route('categories')->with('success', 'Category updated successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error',' faild to update category: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
        $this->categoryInterface->delete($category->id);
        return redirect()->back()->with('success', 'Category created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error','faild to delete category: ' . $e->getMessage());
        }
    }
}
