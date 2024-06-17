<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Voter::with(['village.district'])
                ->where(function ($query) {
                    if (request()->subdistrict) {
                        $query->where('subdistrict', request()->subdistrict);
                    }
                    if (request()->village) {
                        $query->where('village_id', request()->village);
                    }
                    if (request()->downline == "true") {
                        $query->whereHas('downline');
                    }
                })
                ->withCount('downline')
                ->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="info" data-id="' . $data->id . '" class="info btn btn-info btn-sm">Info</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="QrCode" data-id="' . $data->id . '" class="QrCode btn btn-warning btn-sm">Download QrCode</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';

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
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('images/voter'), $imageName);
            $imageUrl = 'images/voter/' . $imageName;
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
        // check if voter qr code exists
        if (!Storage::exists("qrcode/$voter->id.png")) {
            return response()->json(['url' => asset("qrcode/$voter->id.png")]);
        }

        $url_register = route('register');
        $url = "https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=" . $url_register . "?$voter->id";

        // Nama file untuk menyimpan gambar
        $saveTo = "qrcode/$voter->id.png";

        if (!Storage::exists('public/qrcode')) {
            Storage::makeDirectory('public/qrcode');
        }

        // Download the QR code image and save it to the file
        file_put_contents(public_path("storage/$saveTo"), file_get_contents($url));

        // Mengembalikan nama file
        return response()->json(['url' => asset("qrcode/$voter->id.png")]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|integer|digits:16|unique:voters,nik,' . $voter->id,
            'kk' => 'nullable|integer|digits:16|unique:voters,kk,' . $voter->id,
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
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('images/voter'), $imageName);
            $imageUrl = 'images/voter/' . $imageName;
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
        if ($request->type == 'kecamatan' && $request->type == 'kecamatan') {
            $ambildata = Voter::with(['village.district'])
                ->where('subdistrict', $request->subdistrict)
                ->get();
            $type = 'Kecamatan';
        } elseif ($request->village && $request->type != 'kecamatan' && $request->type != 'semua') {
            $ambildata = Voter::with(['village.district'])
                ->where('village_id', $request->village)
                ->get();
            $type = 'Kelurahan';
        } else {
            $ambildata = Voter::with(['village.district'])->get();
            $type = 'Semua';
        }

        if ($ambildata->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        $sourceFolder = storage_path('images/voter');
        $destinationFolder = public_path('images/voter');

        // Buat symlink jika belum ada
        try {
            if (!file_exists($destinationFolder)) {
                symlink($sourceFolder, $destinationFolder);
                \Log::info('Symlink created successfully');
            }
        } catch (\Exception $e) {
            \Log::error('Error creating symlink: ' . $e->getMessage());
        }

        // Debugging: Check if images exist in source folder
        $files = glob("$sourceFolder/*");
        \Log::info('Files in source folder: ' . print_r($files, true));

        $pdf = Pdf::loadView('admin.voters.pdf', compact('ambildata', 'type'));
        $pdf->set_option('isRemoteEnabled', true);

        // Generate unique filename
        $filename = 'saksi_' . uniqid() . '.pdf';

        // Save PDF to public folder
        //save to tmp folder
        $pdf->save(public_path('pdfs/' . $filename));

        // Remove symlink
        if (is_link($destinationFolder)) {
            try {
                unlink($destinationFolder);
                \Log::info('Symlink removed successfully');
            } catch (\Exception $e) {
                \Log::error('Error removing symlink: ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'url' => asset('pdfs/' . $filename)]);
    }
}
