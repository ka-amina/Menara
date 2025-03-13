<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\interfaces\CategoryInterface;

class CategoryController extends Controller
{

    public $categoryInterface;

    public function __construct (CategoryInterface $categoryInterface){
        $this->categoryInterface=$categoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= $this->categoryInterface->getAll();
        return view('Admin.categories.index', compact('categories'));
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
        $data=$request->validated();
        $this->categoryInterface->create($data);
        return redirect()->back()->with('success', 'Category created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data=$request->validated();
        $this->categoryInterface->update($category->id, $data);
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryInterface->delete($category->id);
        return redirect()->back()->with('success', 'Category created successfully.');
    }
}
