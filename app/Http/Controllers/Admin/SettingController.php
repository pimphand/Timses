<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $settings = Setting::all();
            // $data = [];
            // foreach ($settings as $setting) {
            //     $data[$setting->name] = $setting->value;
            // }

            // return response()->json($data);

            return $this->iori();
        }

        return view('admin.setting.iori');
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
        if ($data1 = $request->jargon) {
            Setting::updateOrCreate(['name' => 'jargon'], ['value' => $data1]);
        }

        // if ($data2 = $request->data2) {
        //     $data2['prestasi'] = array_filter($data2['prestasi']);
        //     $data2['wakil_prestasi'] = array_filter($data2['wakil_prestasi']);
        //     if ($request->hasFile('data2.photo_1')) {
        //         //remove old photo
        //         $image = $request->file('data2.photo_1');
        //         $imageName = time() . '1.' . $image->getClientOriginalExtension();
        //         $image->move(public_path('images/paslon'), $imageName);

        //         $data2['photo_1'] = 'images/paslon/' . $imageName;
        //     } else {
        //         $data2['photo_1'] = $data2['old_photo_1'] ?? null;
        //     }
        //     if ($request->hasFile('data2.photo_2')) {
        //         $image = $request->file('data2.photo_2');
        //         $imageName = time() . '2.' . $image->getClientOriginalExtension();
        //         $image->move(public_path('images/paslon'), $imageName);

        //         $data2['photo_2'] = 'images/paslon/' . $imageName;
        //     } else {
        //         $data2['photo_2'] = $data2['old_photo_2'] ?? null;
        //     }

        //     Setting::updateOrCreate(['name' => 'data_2'], ['value' => $data2]);
        // }

        if ($data3 = $request->data3) {
            $data3['misi'] = array_filter($data3['misi']);
            Setting::updateOrCreate(['name' => 'data_3'], ['value' => $data3]);
        }

        if ($bupati = $request->bupati) {
            $bupatiold = Setting::where('name', 'bupati')->first();
            $oldImages = $bupatiold->value['foto'];
            if ($request->hasFile('bupati.foto')) {
                $image = $request->file('bupati.foto');
                $imageName = 'bupati_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('photo/'), $imageName);
                $imageUrl = 'photo/' . $imageName;
                $bupati['foto'] = $imageUrl;

                if (File::exists(public_path($oldImages))) {
                    File::delete(public_path($oldImages));
                }
            } else {
                $bupati['foto'] = $bupatiold['foto'];
            }

            Setting::updateOrCreate(['name' => 'bupati'], ['value' => $bupati]);
        }

        // dd($request->all());
        if ($request->has('wakilbupati')) {
            $wakilbupati = $request->wakilbupati;
            $wakilbupatiold = Setting::where('name', 'wakilbupati')->first();

            $oldImage = $wakilbupatiold->value['foto'];
            if ($request->hasFile('wakilbupati.foto')) {
                $image = $request->file('wakilbupati.foto');
                $imageName = 'wakilbupati_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('photo/'), $imageName);
                $imageUrl = 'photo/' . $imageName;
                $wakilbupati['foto'] = $imageUrl;

                if (File::exists(public_path($oldImage))) {
                    File::delete(public_path($oldImage));
                }
            } elseif ($wakilbupatiold) {
                $wakilbupati['foto'] = $wakilbupatiold->value['foto'];
            }

            Setting::updateOrCreate(
                ['name' => 'wakilbupati'],
                ['value' => $wakilbupati]
            );
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function storeIori(Request $request)
    {
        if ($request->image) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photo/'), $imageName);
            $imageUrl = 'photo/' . $imageName;
            Images::create([
                'name' => $image->getClientOriginalName(),
                'path' => $imageUrl,
                'type' => 'homepage',
            ]);

            return response()->json([
                'message' => 'Image uploaded successfully',
                'data' => Images::where('type', 'homepage')->get(),
            ]);
        }
    }

    public function destroyIori()
    {
        $image = Images::find(request()->id);
        if ($image) {
            $image->delete();
        }

        return response()->json([
            'message' => 'Image deleted successfully',
            'data' => Images::where('type', 'homepage')->get(),
        ]);
    }

    public function iori()
    {
        $homepage = Images::where('type', 'homepage')->get();
        $jargon = Setting::where('name', 'jargon')->first()->value;
        $visiMisi = Setting::where('name', 'data_3')->first()->value;
        $bupati = Setting::where('name', 'bupati')->first()->value;
        $wakilbupati = Setting::where('name', 'wakilbupati')->first()->value;

        return response()->json([
            'homepage' => $homepage,
            'jargon' => $jargon,
            'bupati' => $bupati,
            'visiMisi' => $visiMisi,
            'wakilbupati' => $wakilbupati,
        ]);
    }
}
