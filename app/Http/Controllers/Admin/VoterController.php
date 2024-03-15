<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.voters.index', [
            'voters' => Voter::latest()->get()
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
            'name' => 'required',
            'nik' => 'required|integer|unique:voters,nik',
            'kk' => 'nullable|integer|unique:voters,kk',
            'tps' => 'nullable',
            'address' => 'nullable',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'village' => 'required',
            'phone' => 'nullable',
            'identity_card' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('identity_card')) {
            $image = $request->file('identity_card');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['identity_card'] = $imageName;
        }

        $voter = Voter::create($validated->validated());

        return response()->json(['message' => 'Voter created successfully', 'voter' => $voter]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Voter $voter)
    {
        return response()->json(['voter' => $voter]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|integer|unique:voters,nik,' . $voter->id,
            'kk' => 'nullable|integer|unique:voters,kk,' . $voter->id,
            'tps' => 'nullable',
            'address' => 'nullable',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'village' => 'required',
            'phone' => 'nullable',
            'identity_card' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('identity_card')) {
            // Delete old image
            if (file_exists(public_path('images/' . $voter->identity_card))) {
                unlink(public_path('images/' . $voter->identity_card));
            }

            $image = $request->file('identity_card');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['identity_card'] = $imageName;
        }

        $voter->update($validated->validated());

        return response()->json(['message' => 'Voter updated successfully', 'voter' => $voter]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voter $voter)
    {
        if (file_exists(public_path('images/' . $voter->identity_card))) {
            unlink(public_path('images/' . $voter->identity_card));
        }

        $voter->delete();
    }
}
