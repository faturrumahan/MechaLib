<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Item_Image;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    //display all items
    public function index()
    {
        $items = Item::latest();
        $from = request('search');

        //if user search by category
        if (request('category')) {
            $cat = Category::firstWhere('slug', request('category'));
            $from = $cat->name;
        }

        return view('item.index', [
            "title" => "Item",
            "from" => $from,
            "images" => Item_image::all(),
            "items" => $items->filter(request(['search', 'category']))
                ->paginate(28)->withQueryString()
        ]);
    }
    //display detail submission
    public function detail(Item $detail)
    {
        return view('item.item-detail', [
            "item" => $detail,
            "images" => Item_image::where('item_id', '=', $detail->id)->get(),
        ]);
    }
}
