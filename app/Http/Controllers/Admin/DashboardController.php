<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function data(Request $request)
    {
        $voters = Voter::query();

        //districts
        $districts = $voters->select('subdistrict', \DB::raw('count(*) as total_voters'))
            ->groupBy('subdistrict')
            ->get()
            ->map(function ($voter) {
                return [
                    'district' => $voter->district->name,
                    'total_voters' => $voter->total_voters,
                ];
            });

        if ($request->ajax()) {

        }
        $villages = $voters->select('village_id', \DB::raw('count(*) as total_voters'))
            ->groupBy('village_id')
            ->get()
            ->map(function ($voter) {
                return [
                    'village' => $voter->village->name,
                    'total_voters' => $voter->total_voters,
                ];
            });

        return response()->json([
            'districts' => $districts,
            'villages' => $villages,
        ]);
    }
}
