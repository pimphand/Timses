<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function data(Request $request)
    {
        $data = DB::table('data_recaps')
            ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
            ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
            ->where('candidates.default', '=', 1)
            ->select(DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
            ->first();

        if ($request->getKecamatan) {
            $kecamatan = DB::table('data_recaps')
                ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
                ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
                ->where('candidates.default', '=', 1)
                ->where('data_recaps.district', '=', $request->getKecamatan)
                ->select(DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
                ->first();

            return [
                'hasil_kecamatan' => (int) $kecamatan->total_vote,
                'vote_kecamatan' => Voter::where('subdistrict', '=', $request->getKecamatan)->count(),
            ];
        }
        if ($request->getKelurahan) {
            $kelurahan = DB::table('data_recaps')
                ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
                ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
                ->where('candidates.default', '=', 1)
                ->where('data_recaps.village', '=', $request->getKelurahan)
                ->select(DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
                ->first();

            return [
                'hasil_kelurahan' => (int) $kelurahan->total_vote,
                'vote_kelurahan' => Voter::where('village_id', '=', $request->getKelurahan)->count(),
            ];
        }

        $voters = DB::table('voters')
            ->join('indonesia_districts as districts', 'voters.subdistrict', '=', 'districts.id')
            ->select('districts.name as district_name', DB::raw('COUNT(*) as total_voters'))
            ->groupBy('districts.name')
            ->whereNull('voters.deleted_at')
            ->get();

        $series = [];
        $labels = [];

        foreach ($voters as $item) {
            $labels[] = $item->district_name;
            $series[] = (int) $item->total_voters;
        }

        $voters_kelurahan = DB::table('voters')
            ->join('indonesia_villages as village', 'voters.village_id', '=', 'village.id')
            ->select('village.name as village_name', DB::raw('COUNT(*) as total_voters'))
            ->groupBy('village.name')
            ->whereNull('voters.deleted_at')
            ->get();

        $series_kelurahan = [];
        $labels_kelurahan = [];

        foreach ($voters_kelurahan as $item) {
            $labels_kelurahan[] = $item->village_name;
            $series_kelurahan[] = (int) $item->total_voters;
        }

        return [
            'hasil_kota' => (int) $data->total_vote,
            'vote_kota' => Voter::count(),
            'saksi' => User::where('role', 'saksi')->count(),
            'series_kecamatan' => [
                'series' => $series,
                'labels' => $labels,
            ],
            'series_kelurahan' => [
                'series' => $series_kelurahan,
                'labels' => $labels_kelurahan,
            ],
        ];
    }

    public function quickCount(Request $request)
    {
        return view('admin.quick_count');
    }

    public function quickCountData(Request $request)
    {
        if ($request->getKota) {
            $data = DB::table('data_recaps')
                ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
                ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
                ->select('candidates.name as candidate_name', 'candidates.vice_name as vice_name', DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
                ->groupBy('candidates.name', 'candidates.vice_name')
                ->get();

            $series = [];
            $labels = [];

            foreach ($data as $row) {
                $series[] = (int) $row->total_vote;
                $labels[] = $row->candidate_name.($row->vice_name ? ' & '.$row->vice_name : '');
            }

            return response()->json([
                'data' => [
                    'series' => $series,
                    'labels' => $labels,
                ],
            ]);
        }
        if ($request->getKecamatan) {
            $kecamatans = DB::table('data_recaps')
                ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
                ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
                ->whereExists(function ($subQuery) use ($request) {
                    $subQuery->from('indonesia_districts')
                        ->whereColumn('indonesia_districts.id', 'data_recaps.district')
                        ->where('indonesia_districts.id', $request->getKecamatan);
                })
                ->select('candidates.name as candidate_name', 'candidates.vice_name as vice_name', \DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
                ->groupBy('candidates.name', 'candidates.vice_name')
                ->get();
            $series_kecamatan = [];
            $labels_kecamatan = [];

            foreach ($kecamatans as $kecamatan) {
                $series_kecamatan[] = (int) $kecamatan->total_vote;
                $labels_kecamatan[] = $kecamatan->candidate_name.($kecamatan->vice_name ? ' & '.$kecamatan->vice_name : '');
            }

            return response()->json([
                'data' => [
                    'series' => $series_kecamatan,
                    'labels' => $labels_kecamatan,
                ],
                'data_kecamatan' => $kecamatans->count(),
            ]);
        }

        if ($request->getKelurahan) {
            $kelurahans = DB::table('data_recaps')
                ->join('detail_data_recaps', 'data_recaps.id', '=', 'detail_data_recaps.data_recap_id')
                ->join('candidates', 'detail_data_recaps.candidate_id', '=', 'candidates.id')
                ->whereExists(function ($subQuery) use ($request) {
                    $subQuery->from('indonesia_villages')
                        ->whereColumn('indonesia_villages.id', 'data_recaps.village')
                        ->where('indonesia_villages.id', $request->getKelurahan);
                })
                ->select('candidates.name as candidate_name', 'candidates.vice_name as vice_name', \DB::raw('SUM(detail_data_recaps.vote) as total_vote'))
                ->groupBy('candidates.name', 'candidates.vice_name')
                ->get();

            $series_kelurahann = [];
            $labels_kelurahann = [];

            foreach ($kelurahans as $kelurahan) {
                $series_kelurahann[] = (int) $kelurahan->total_vote;
                $labels_kelurahann[] = $kelurahan->candidate_name.($kelurahan->vice_name ? ' & '.$kelurahan->vice_name : '');
            }

            return response()->json([
                'data' => [
                    'series' => $series_kelurahann,
                    'labels' => $labels_kelurahann,
                ],
            ]);
        }

        return false;
    }
}
