<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function storeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nik' => 'required|integer|unique:voters,nik|digits:16',
            'kk' => 'nullable|integer|unique:voters,kk|digits:16',
            'tps' => 'nullable',
            'address' => 'nullable',
            'subdistrict' => 'required|integer|exists:indonesia_districts,id',
            'village_id' => 'required|integer|exists:indonesia_villages,id',
            'phone' => 'nullable|numeric',
            'identity_card' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.digits' => 'NIK harus 16 digit',
            'kk.unique' => 'KK sudah terdaftar',
            'kk.digits' => 'KK harus 16 digit',
            'identity_card.required' => 'KTP harus diisi',
            'identity_card.mimes' => 'KTP harus berupa file gambar',
            'identity_card.max' => 'KTP maksimal 2MB',
            'subdistrict.required' => 'Kecamatan harus diisi',
            'village_id.required' => 'Kelurahan/Desa harus diisi',
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'nik.required' => 'NIK harus diisi',
            'kk.required' => 'KK harus diisi',
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

    public function data()
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->name] = $setting->value;
        }

        return response()->json([
            'data' => $data,
            'news' => News::all(),
        ]);
    }

    public function news()
    {
        $news = News::all();

        return view('news', compact('news'));
    }

    public function detail($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view('news-details', compact('news'));
    }
}
