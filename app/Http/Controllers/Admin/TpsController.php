<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\Village;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            if (request()->has('show')) {
                return Tps::with(['district', 'village'])
                    ->select('district_id', 'village_id', DB::raw('count(*) as total_tps'))
                    ->groupBy('district_id', 'village_id')
                    ->get()
                    ->map(function ($tps) {
                        return [
                            'kecamatan' => $tps->district->name,
                            'total_tps' => $tps->total_tps,
                            'district_id' => $tps->district->id,
                            'village_id' => $tps->village->id,
                            'desa' => $tps->village->name,
                        ];
                    });

            }
            if (request()->has('datatable')) {
                return datatables()->of(Tps::where('district_id', request()->district)->where('village_id', request()->village)->with(['district', 'village'])->latest()->get())
                    ->addColumn('action', function ($data) {
                        $button = '<button type="button" name="edit" data-id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        return view('admin.tps.index');
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
            'village_id' => 'required',
            'district_id' => 'required',
            'total' => 'nullable|numeric',
        ]);
        $village = Village::find($request->village_id);
        if ($request->total) {
            for ($i = 0; $i <= $request->total; $i++) {
                Tps::create([
                    'name' => 'TPS '.$i,
                    'village_id' => $request->village_id,
                    'district_id' => $village->district->id,
                ]);
            }
        } else {
            Tps::create(array_merge($validated->validated(), ['district_id' => $village->district->id]));
        }

        return response()->json(['message' => 'Tps created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tps $tps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tps $tps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $tps = Tps::find($id);
        $village = Village::find($request->village_id);
        $tps->update([
            'name' => $request->name,
            'village_id' => $request->village_id,
            'district_id' => $village->district->id,
        ]);

        return response()->json(['message' => 'Tps updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tps::find($id)->delete();

        return response()->json(['message' => 'Tps deleted successfully']);
    }

    public function data(Request $request)
    {
        return Tps::where('district_id', $request->district_id)->where('village_id', $request->village_id)->orderBy('created_at', 'asc')->get();
    }
}
