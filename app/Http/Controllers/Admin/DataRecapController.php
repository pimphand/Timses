<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\DataRecap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataRecapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataRecap = DataRecap::where('tps_id', $request->tps_id)->with(['details.candidate', 'tps', 'village', 'district'])->latest()->first();

            return response()->json($dataRecap);
        }

        return view('admin.data-recap.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidates = Candidate::all();

        return view('admin.data-recap.create', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),
            [
                'data_valid' => 'required|numeric',
                'data_invalid' => 'required|numeric',
                'data_total' => 'required|numeric',
                'photo_1' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'photo_2' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'photo_3' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'candidates' => 'required|array',
                'votes' => 'required|array',
                'candidates.*' => 'required|exists:candidates,id',
                'votes.*' => 'required|numeric',
            ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        //data_valid + data_invalid = data_total
        if ($request->data_valid + $request->data_invalid != $request->data_total) {
            return response()->json(['errors' => ['data_total' => 'Data total harus sama dengan data sah + data tidak sah']], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = auth()->user();
            $dataRecapData = [
                'tps_id' => $user->tps_id,
                'user_id' => $user->id,
                'village' => $user->tps->village_id,
                'district' => $user->tps->district->id,
                'data_valid' => $request->data_valid,
                'data_invalid' => $request->data_invalid,
                'data_total' => $request->data_total,
            ];
            for ($i = 1; $i <= 3; $i++) {
                $fieldName = 'photo_'.$i;
                if ($request->hasFile('photo_'.$i)) {
                    $photo = $request->file('photo_'.$i);
                    $photoName = time().'_'.$i.'.'.$photo->getClientOriginalExtension();
                    $photo->move(public_path('images/data-recap'), $photoName);
                    $dataRecapData[$fieldName] = 'images/data-recap/'.$photoName;
                } else {
                    $dataRecapData[$fieldName] = null;
                }
            }

            $dataRecap = DataRecap::create($dataRecapData);

            foreach ($request->candidates as $key => $candidate) {
                $dataRecap->details()->create([
                    'candidate_id' => $candidate,
                    'vote' => $request->votes[$key],
                ]);
            }

            return response()->json(['message' => 'Data Recap Created']);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(DataRecap $dataRecap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataRecap $dataRecap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataRecap $dataRecap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataRecap $dataRecap)
    {
        //
    }
}
