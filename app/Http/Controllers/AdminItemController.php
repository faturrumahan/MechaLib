<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Item_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.item.index', [
            'items' => Item::all(),
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
        return view('dashboard.item.create', [
            'categories' => Category::all()
        ]);
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
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Item::class, 'slug', $validatedData['name']);
        $validatedData['name'] = ucwords($validatedData['name']);

        if ($request->hasfile('images')) {
            $validatedImage = $request->validate([
                'images.*' => 'image|max:3000'
            ]);
        }

        Item::create($validatedData);

        $item = Item::latest()->first();
        foreach ($request->file('images') as $file) {
            $validatedImage['item_id'] = $item->id;
            $validatedImage['image'] = $file->store('item-img');
            Item_Image::create($validatedImage);
        }
        return redirect('dashboard/items')->with('success', 'Item Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('dashboard.item.edit', [
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $validatedData['name'] = ucwords($validatedData['name']);

        if ($request->hasfile('images')) {
            $validatedImage = $request->validate([
                'images.*' => 'image|max:3000'
            ]);
        }

        Item::where('id', $item->id)->update($validatedData);

        $imageDelete = Item_Image::where('item_id', $item->id)->get();
        foreach ($imageDelete as $imgdlt) {
            Storage::delete($imgdlt->image);
        }
        Item_Image::where('item_id', $item->id)->delete();
        foreach ($request->file('images') as $file) {
            $validatedImage['image'] = $file->store('item-img');
            $validatedImage['item_id'] = $item->id;
            item_Image::create($validatedImage);
        }
        return redirect('dashboard/items')->with('success', 'Item Edited Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $imageDelete = Item_Image::where('item_id', $item->id)->get();
        foreach ($imageDelete as $imgdlt) {
            Storage::delete($imgdlt->image);
        }
        Item::destroy($item->id);
        return redirect('dashboard/items')->with('success', 'Item Deleted!');
    }
}
