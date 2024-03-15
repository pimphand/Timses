<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.volunteers.index', [
            'volunteers' => Volunteer::latest()->get()
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
            'required|integer|unique:volunteers,nik'
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $volunteer = Volunteer::create($validated->validated());

        return response()->json(['message' => 'Volunteer created successfully', 'volunteer' => $volunteer]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        return response()->json(['volunteer' => $volunteer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|integer|unique:volunteers,nik,' . $volunteer->id,
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $volunteer->update($validated->validated());

        return response()->json(['message' => 'Volunteer updated successfully', 'volunteer' => $volunteer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        return response()->json(['message' => 'Volunteer deleted successfully', 'volunteer' => $volunteer->delete()]);
    }
}
