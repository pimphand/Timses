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
        if (request()->ajax()) {
            return datatables()->of(News::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" data-id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.news.index');
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
            'publish_date' => 'required',
            'date' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
            $imageUrl = 'images/news/'.$imageName;
        } else {
            $imageUrl = null;
        }

        $news = News::create(array_merge($validated->validated(), ['image' => $imageUrl]));

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
            'publish_date' => 'required',
            'date' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }
        //image
        if ($request->hasFile('image')) {
            //delete old image
            if ($news->image && file_exists(public_path('images/'.$news->image))) {
                if (file_exists(public_path($news->image))) {
                    unlink(public_path($news->image));
                }
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
            $imageUrl = 'images/news/'.$imageName;
        } else {
            $imageUrl = null;
        }

        $news->update($validated->validated());
        $news->update(['image' => $imageUrl]);

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if (file_exists(public_path('images/'.$news->image))) {
            unlink(public_path('images/'.$news->image));
        }

        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }
}
