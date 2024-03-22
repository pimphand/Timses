<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $settings = Setting::all();
            $data = [];
            foreach ($settings as $setting) {
                $data[$setting->name] = $setting->value;
            }

            return response()->json($data);
        }

        return view('admin.setting.index');
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
        //
        if ($data1 = $request->data1) {
            $data1['program_kerja'] = array_filter($data1['program_kerja']);
            Setting::updateOrCreate(['name' => 'data_1'], ['value' => $data1]);
        }

        if ($data2 = $request->data2) {
            $data2['prestasi'] = array_filter($data2['prestasi']);
            $data2['wakil_prestasi'] = array_filter($data2['wakil_prestasi']);
            if ($request->hasFile('data2.photo_1')) {
                //remove old photo
                $image = $request->file('data2.photo_1');
                $imageName = time().'1.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/paslon'), $imageName);

                $data2['photo_1'] = 'images/paslon/'.$imageName;
            } else {
                $data2['photo_1'] = $data2['old_photo_1'] ?? null;
            }
            if ($request->hasFile('data2.photo_2')) {
                $image = $request->file('data2.photo_2');
                $imageName = time().'2.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/paslon'), $imageName);

                $data2['photo_2'] = 'images/paslon/'.$imageName;
            } else {
                $data2['photo_2'] = $data2['old_photo_2'] ?? null;
            }

            Setting::updateOrCreate(['name' => 'data_2'], ['value' => $data2]);

        }

        if ($data3 = $request->data3) {

            $data3['misi'] = array_filter($data3['misi']);
            Setting::updateOrCreate(['name' => 'data_3'], ['value' => $data3]);
        }

        return response()->json(['message' => 'Data berhasil disimpan!']);
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
}
