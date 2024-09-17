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
        if (request()->ajax()) {
            $data = auth()->user()->dataRecaps;
            $data->load('details');

            return $data;
        }
        // dd(auth()->user()->tps);
        return view('admin.data-recap.create', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = Validator::make(
            $request->all(),
            [
                'data_valid' => 'nullable|numeric',
                'data_invalid' => 'required|numeric',
                'data_total' => 'required|numeric',
                'attendance' => 'required|numeric',
                'absent' => 'required|numeric',
                'attendance_total' => 'required|numeric',
                'photo_1' => 'required|mimes:jpg,jpeg,png|max:2048',
                'photo_2' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'photo_3' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'candidates' => 'required|array',
                'votes' => 'required|array',
                'candidates.*' => 'required|exists:candidates,id',
                'votes.*' => 'required|numeric',
            ],
            [
                'photo_1.required' => 'Foto 1 harus diisi',
                'photo_1.mimes' => 'Foto 1 harus berupa file jpg, jpeg, atau png',
                'photo_1.max' => 'Foto 1 maksimal 2MB',
                'data_valid.numeric' => 'Data sah harus berupa angka',
                'data_invalid.required' => 'Data tidak sah harus diisi',
                'data_invalid.numeric' => 'Data tidak sah harus berupa angka',
                'data_total.required' => 'Data total harus diisi',
                'data_total.numeric' => 'Data total harus berupa angka',
                'candidates.required' => 'Calon harus diisi',
                'candidates.array' => 'Calon harus berupa array',
                'votes.required' => 'Suara harus diisi',
                'votes.array' => 'Suara harus berupa array',
                'candidates.*.required' => 'Calon harus diisi',
                'candidates.*.exists' => 'Calon tidak ditemukan',
                'votes.*.required' => 'Suara harus diisi',
                'votes.*.numeric' => 'Suara harus berupa angka',
                'attendance.required' => 'Kehadiran harus diisi',
                'attendance.numeric' => 'Kehadiran harus berupa angka',
                'absent.required' => 'Tidak hadir harus diisi',
                'absent.numeric' => 'Tidak hadir harus berupa angka',
                'attendance_total.required' => 'Total kehadiran harus diisi',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        //data_valid + data_invalid = data_total
        if (array_sum($request->votes) + $request->data_invalid != $request->data_total) {
            return response()->json(['errors' => ['data_total' => 'Total suara jumlahnya harus sama dengan perolehan paslon']], 422);
        }

        if ($request->attendance + $request->absent != $request->attendance_total) {
            return response()->json(['errors' => ['attendance_total' => 'Total DPT jumlahnya harus sama dengan DPT hadir + DPT Tidak hadir']], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = auth()->user();
            $dataRecapData = [
                'tps_id' => $user->tps_id,
                'user_id' => $user->id,
                'village' => $user->tps->village_id,
                'district' => $user->tps->district->id,
                'data_valid' => array_sum($request->votes),
                'data_invalid' => $request->data_invalid,
                'data_total' => $request->data_total,
                'attendance' => $request->attendance,
                'absent' => $request->absent,
                'attendance_total' => $request->attendance_total,
            ];
            for ($i = 1; $i <= 3; $i++) {
                $fieldName = 'photo_' . $i;
                if ($request->hasFile('photo_' . $i)) {
                    $photo = $request->file('photo_' . $i);
                    $photoName = time() . '_' . $i . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('images/data-recap'), $photoName);
                    $dataRecapData[$fieldName] = 'images/data-recap/' . $photoName;
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
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = Validator::make(
            $request->all(),
            [
                'data_valid' => 'nullable|numeric',
                'data_invalid' => 'required|numeric',
                'data_total' => 'required|numeric',
                'attendance' => 'required|numeric',
                'absent' => 'required|numeric',
                'attendance_total' => 'required|numeric',
                'photo_1' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'photo_2' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'photo_3' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'candidates' => 'required|array',
                'votes' => 'required|array',
                'candidates.*' => 'required|exists:candidates,id',
                'votes.*' => 'required|numeric',
            ],
            [
                'photo_1.required' => 'Foto 1 harus diisi',
                'photo_1.mimes' => 'Foto 1 harus berupa file jpg, jpeg, atau png',
                'photo_1.max' => 'Foto 1 maksimal 2MB',
                'data_valid.numeric' => 'Data sah harus berupa angka',
                'data_invalid.required' => 'Data tidak sah harus diisi',
                'data_invalid.numeric' => 'Data tidak sah harus berupa angka',
                'data_total.required' => 'Data total harus diisi',
                'data_total.numeric' => 'Data total harus berupa angka',
                'candidates.required' => 'Calon harus diisi',
                'candidates.array' => 'Calon harus berupa array',
                'votes.required' => 'Suara harus diisi',
                'votes.array' => 'Suara harus berupa array',
                'candidates.*.required' => 'Calon harus diisi',
                'candidates.*.exists' => 'Calon tidak ditemukan',
                'votes.*.required' => 'Suara harus diisi',
                'votes.*.numeric' => 'Suara harus berupa angka',
                'attendance.required' => 'Kehadiran harus diisi',
                'attendance.numeric' => 'Kehadiran harus berupa angka',
                'absent.required' => 'Tidak hadir harus diisi',
                'absent.numeric' => 'Tidak hadir harus berupa angka',
                'attendance_total.required' => 'Total kehadiran harus diisi',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        //data_valid + data_invalid = data_total
        if (array_sum($request->votes) + $request->data_invalid != $request->data_total) {
            return response()->json(['errors' => ['data_total' => 'Total suara jumlahnya harus sama dengan perolehan paslon']], 422);
        }

        if ($request->attendance + $request->absent != $request->attendance_total) {
            return response()->json(['errors' => ['attendance_total' => 'Total DPT jumlahnya harus sama dengan DPT hadir + DPT Tidak hadir']], 422);
        }

        return DB::transaction(function () use ($request, $id) {
            $user = auth()->user();
            $dataRecap = DataRecap::find($id);
            $dataRecapData = [
                'tps_id' => $user->tps_id,
                'user_id' => $user->id,
                'village' => $user->tps->village_id,
                'district' => $user->tps->district->id,
                'data_valid' => array_sum($request->votes),
                'data_invalid' => $request->data_invalid,
                'data_total' => $request->data_total,
                'attendance' => $request->attendance,
                'absent' => $request->absent,
                'attendance_total' => $request->attendance_total,
            ];
            for ($i = 1; $i <= 3; $i++) {
                $fieldName = 'photo_' . $i;
                if ($request->hasFile('photo_' . $i)) {
                    $photo = $request->file('photo_' . $i);
                    $photoName = time() . '_' . $i . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('images/data-recap'), $photoName);
                    $dataRecapData[$fieldName] = 'images/data-recap/' . $photoName;
                } else {
                    $dataRecapData[$fieldName] = $dataRecap->$fieldName;
                }
            }


            $dataRecap->update($dataRecapData);

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
     * Remove the specified resource from storage.
     */
    public function destroy(DataRecap $dataRecap)
    {
        //
    }
}
