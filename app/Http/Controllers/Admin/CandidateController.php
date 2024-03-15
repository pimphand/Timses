<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Candidate::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.candidates.index');
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
            'name' => 'required',
            'mission' => 'nullable',
            'vision' => 'nullable',
            'photo' => 'nullable',
            'phone' => 'nullable',
            'biodata' => 'nullable',
            'vice_name' => 'required',
            'vice_photo' => 'nullable',
            'vice_vision' => 'nullable',
            'vice_mission' => 'nullable',
            'vice_phone' => 'nullable',
            'vice_biodata' => 'nullable',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['photo'] = $imageName;
        }

        if ($request->hasFile('vice_photo')) {
            $image = $request->file('vice_photo');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['vice_photo'] = $imageName;
        }

        $candidate = Candidate::create($validated->validated());

        return response()->json(['message' => 'Candidate created successfully', 'candidate' => $candidate]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return response()->json(['candidate' => $candidate]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'mission' => 'nullable',
            'vision' => 'nullable',
            'photo' => 'nullable',
            'phone' => 'nullable',
            'biodata' => 'nullable',
            'vice_name' => 'required',
            'vice_photo' => 'nullable',
            'vice_vision' => 'nullable',
            'vice_mission' => 'nullable',
            'vice_phone' => 'nullable',
            'vice_biodata' => 'nullable',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['photo'] = $imageName;
        }

        if ($request->hasFile('vice_photo')) {
            $image = $request->file('vice_photo');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['vice_photo'] = $imageName;
        }

        $candidate->update($validated->validated());

        return response()->json(['message' => 'Candidate updated successfully', 'candidate' => $candidate]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        if (file_exists(public_path('images/' . $candidate->photo))) {
            unlink(public_path('images/' . $candidate->photo));
        }

        if (file_exists(public_path('images/' . $candidate->vice_photo))) {
            unlink(public_path('images/' . $candidate->vice_photo));
        }

        $candidate->delete();
    }
}
