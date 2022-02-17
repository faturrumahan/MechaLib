<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.submission.index', [
            'submissions' => Submission::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.submission.create', [
            'kits' => Item::where('category_id', '=', 2)->get(),
            'switches' => Item::where('category_id', '=', 3)->get(),
            'keycaps' => Item::where('category_id', '=', 4)->get(),
            'pcbs' => Item::where('category_id', '=', 5)->get(),
            'cases' => Item::where('category_id', '=', 6)->get(),
            'plates' => Item::where('category_id', '=', 7)->get(),
            'stabs' => Item::where('category_id', '=', 8)->get(),
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
        function convertYoutube($string)
        {
            return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "//www.youtube.com/embed/$2",
                $string
            );
        }

        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
            'kit_name' => 'required',
            'switch_name' => 'required',
            'keycaps_name' => 'required',
            'plate_name' => 'required',
            'case_name' => 'required',
            'pcb_name' => 'required',
            'stab_name' => 'required',
            'video' => ['url', function ($attribute, $value, $fail) {
                if (!preg_match('/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/', $value)) {
                    $fail(trans("The video must be a valid Youtube URL", ["name" => trans("general.url")]));
                }
            }, 'nullable'],
        ]);

        $validatedData['slug'] = SlugService::createSlug(Submission::class, 'slug', $validatedData['name']);
        $validatedData['name'] = ucwords($validatedData['name']);

        if ($request->input('video')) {
            $validatedData['link'] = convertYoutube($request->input('video'));
        }

        $validatedImage = $request->validate([
            'images.*' => 'image|max:3000'
        ]);

        Submission::create($validatedData);

        $submission = Submission::latest()->first();
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $validatedImage['image'] = $file->store('submission-img');
                $validatedImage['submission_id'] = $submission->id;
                Image::create($validatedImage);
            }
        }

        $request->session()->flash('success', 'Submission Successfull!');
        return redirect('dashboard/submissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        return view('dashboard.submission.edit', [
            'submission' => $submission,
            //'images' => Image::where('submission_id', '=', $submission->id)->get(),
            'kits' => Item::where('category_id', '=', 2)->get(),
            'switches' => Item::where('category_id', '=', 3)->get(),
            'keycaps' => Item::where('category_id', '=', 4)->get(),
            'pcbs' => Item::where('category_id', '=', 5)->get(),
            'cases' => Item::where('category_id', '=', 6)->get(),
            'plates' => Item::where('category_id', '=', 7)->get(),
            'stabs' => Item::where('category_id', '=', 8)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        function updateYoutube($string)
        {
            return preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "//www.youtube.com/embed/$2",
                $string
            );
        }

        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|max:100',
            'slug' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'kit_name' => 'required',
            'switch_name' => 'required',
            'keycaps_name' => 'required',
            'plate_name' => 'required',
            'case_name' => 'required',
            'pcb_name' => 'required',
            'stab_name' => 'required',
            'image' => 'nullable|image|file|max:5000',
            'video' => ['url', function ($attribute, $value, $fail) {
                if (!preg_match('/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/', $value)) {
                    $fail(trans("The video must be a valid Youtube URL", ["name" => trans("general.url")]));
                }
            }, 'nullable'],
        ]);

        $validatedData['name'] = ucwords($validatedData['name']);

        if ($request->input('video')) {
            $validatedData['link'] = updateYoutube($request->input('video'));
        }

        if ($request->hasfile('images')) {
            $validatedImage = $request->validate([
                'images.*' => 'image|max:3000'
            ]);
        }

        Submission::where('id', $submission->id)->update($validatedData);

        $imageDelete = Image::where('submission_id', $submission->id)->get();

        if ($request->hasfile('images')) {
            foreach ($imageDelete as $imgdlt) {
                Storage::delete($imgdlt->image);
            }
            Image::where('submission_id', $submission->id)->delete();
            foreach ($request->file('images') as $file) {
                $validatedImage['image'] = $file->store('submission-img');
                $validatedImage['submission_id'] = $submission->id;
                Image::create($validatedImage);
            }
        }

        $request->session()->flash('success', 'Submission Update Successfull!');
        return redirect('dashboard/submissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        $imageDelete = Image::where('submission_id', $submission->id)->get();
        foreach ($imageDelete as $imgdlt) {
            Storage::delete($imgdlt->image);
        }
        Submission::destroy($submission->id);
        return redirect('dashboard/submissions')->with('success', 'Submission Deleted!');
    }
}
