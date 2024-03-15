<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::latest()->get()
        ]);
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
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'publish_date' => 'required',
            'slug' => 'required',
            'date' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        $news = News::create($validated->validated());

        return response()->json(['message' => 'News created successfully', 'news' => $news]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return $news;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'publish_date' => 'required',
            'date' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }
        //image
        if ($request->hasFile('image')) {
            //delete old image
            if (file_exists(public_path('images/' . $news->image))) {
                unlink(public_path('images/' . $news->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $news->image = $imageName;
        }

        $news->update($validated->validated());

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if (file_exists(public_path('images/' . $news->image))) {
            unlink(public_path('images/' . $news->image));
        }

        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }
}
