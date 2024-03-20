<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class IndonesianTerritoryController extends Controller
{
    public function province(Request $request)
    {
        $provinces = Province::all();

        return response()->json($provinces);
    }

    public function city(Request $request)
    {
        $cities = City::where('province_code', $request->province_id)->get();

        return response()->json($cities);
    }

    public function district(Request $request)
    {
        $districts = District::where('city_code', $request->city_id)->orderBy('name', 'asc')->get();

        return response()->json($districts);
    }

    public function village(Request $request)
    {
        if (strlen($request->district_id) == 7) {
            $villages = Village::where('district_code', $request->district_id)->orderBy('name', 'asc')->get();
        } else {
            $districts = District::where('id', $request->district_id)->orderBy('name', 'asc')->first();
            $villages = Village::where('district_code', $districts->code)->orderBy('name', 'asc')->get();
        }

        return response()->json($villages);
    }
}
