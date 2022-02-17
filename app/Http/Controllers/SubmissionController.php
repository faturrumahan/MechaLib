<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Image;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    //display all submission
    public function index()
    {
        $submission = Submission::latest();
        // return view('submission.index', [
        //     "submissions" => $submission
        // ]);

        return view('submission.index', [
            "images" => Image::all(),
            "submissions" => $submission->filter(request(['search']))
                ->paginate(16)->withQueryString()
        ]);
    }
    //display detail submission
    public function detail(Submission $detail)
    {
        return view('item.submission-detail', [
            // "images" => Image::all(),
            "images" => Image::where('submission_id', '=', $detail->id)->get(),
            "submission" => $detail
        ]);
    }
}
