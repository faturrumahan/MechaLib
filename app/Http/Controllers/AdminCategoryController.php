<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'image' => 'required|image|file|max:3000',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
        $validatedData['name'] = ucwords($validatedData['name']);
        $validatedData['image'] = $request->file('image')->store('category-img');

        Category::create($validatedData);
        return redirect('dashboard/categories')->with('success', 'Category Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'image' => 'nullable|image|file|max:3000',
        ]);

        $validatedData['name'] = ucwords($validatedData['name']);
        if ($request->file('image')) {
            File::delete('storage/' . $request->old_img);
            $validatedData['image'] = $request->file('image')->store('category-img');
        }

        Category::where('id', $category->id)->update($validatedData);
        return redirect('dashboard/categories')->with('success', 'Category Edited Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        Category::destroy($category->id);
        return redirect('dashboard/categories')->with('success', 'Category Deleted!');
    }
}
