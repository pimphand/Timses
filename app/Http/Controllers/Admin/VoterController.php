<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Voter::with(['village.district'])->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.voters.index');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|integer|unique:voters,nik|digits:16',
            'kk' => 'nullable|integer|unique:voters,kk|digits:16',
            'tps' => 'nullable',
            'address' => 'nullable',
            'city' => 'required',
            'subdistrict' => 'required',
            'village_id' => 'required',
            'phone' => 'nullable',
            'identity_card' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('identity_card')) {
            $image = $request->file('identity_card');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('images/voter'), $imageName);
            $imageUrl = 'images/voter/'.$imageName;
        } else {
            $imageUrl = null;
        }

        $voter = Voter::create(array_merge(
            $validator->validated(),
            ['identity_card' => $imageUrl]
        ));

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
        //send email

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|integer|digits:16|unique:voters,nik,'.$voter->id,
            'kk' => 'nullable|integer|digits:16|unique:voters,kk,'.$voter->id,
            'tps' => 'nullable',
            'address' => 'nullable',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'village_id' => 'required',
            'phone' => 'nullable',
            'identity_card' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        if ($request->hasFile('identity_card')) {
            if (file_exists(storage_path($voter->identity_card))) {
                unlink(storage_path($voter->identity_card));
            }
            $image = $request->file('identity_card');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('images/voter'), $imageName);
            $imageUrl = 'images/voter/'.$imageName;
        } else {
            $imageUrl = $voter->identity_card;
        }

        $voter->update($validated->validated());
        $voter->update(['identity_card' => $imageUrl]);

        return response()->json(['message' => 'Voter updated successfully', 'voter' => $voter]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voter $voter)
    {
        $voter->delete();

        return response()->json(['message' => 'Voter deleted successfully']);
    }

    /*
    * print PDF
    */
    public function createPdf(Request $request)
    {
        $ambildata = Voter::all();
        $sourceFolder = storage_path('images/voter');
        $destinationFolder = public_path('images/voter');

        // Buat symlink jika belum ada
        if (! file_exists($destinationFolder)) {
            symlink($sourceFolder, $destinationFolder);
        }

        $pdf = Pdf::loadView('admin.voters.pdf', compact('ambildata'));

        if (is_link($destinationFolder)) {
            unlink($destinationFolder);
        }

        return $pdf->download('saksi.pdf');
    }
}
