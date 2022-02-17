<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            "submissions" => Submission::orderBy('created_at', 'desc')->take(7)->get(),
            "categories" => Category::all(),
            "images" => Image::all(),
        ]);
    }
}
