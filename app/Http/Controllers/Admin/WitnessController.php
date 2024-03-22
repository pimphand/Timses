<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Saksi;
use App\Http\Controllers\Controller;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class WitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(User::with(['tps'])->where('role', 'saksi')->latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" data-id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.witnesses.index');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'phone' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'role' => 'saksi',
            'tps_id' => $request->tps_id,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'Witness created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id,
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'username' => $request->username,
            'tps_id' => $request->tps_id,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'Witness updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['message' => 'Witness deleted successfully']);
    }

    /*
     * generate generateWitness
     */
    public function generateWitness(Request $request)
    {
        $tps = Tps::where('district_id', $request->district_id)->get();
        $users = [];
        foreach ($tps as $tp) {
            $token = Str::random(5);
            $users[] = User::firstOrCreate([
                'tps_id' => $tp->id,
            ], [
                'name' => 'Saksi '.$tp->name,
                'email' => rand(1000, 10000).'saksi_'.Str::replace(' ', '_', $tp->name).'@gmail.com', // change this to your email domain (optional
                'password' => bcrypt($token),
                'username' => Str::random(5).rand(1, 1000),
                'role' => 'saksi',
                'phone' => null,
                'token' => encrypt($token),
                'district_id' => $tp->district_id,
                'village_id' => $tp->village_id,
            ]);
        }

        $excelFileName = 'saksi.xlsx';
        $excelFilePath = 'public/excel/'.$excelFileName;

        Excel::store(new Saksi(collect($users)), $excelFilePath);

        // Generate URL for the saved Excel file
        $excelFileUrl = asset('storage/excel/'.$excelFileName);

        return $excelFileUrl;
    }

    public function export(Request $request)
    {
        $users = User::with(['tps'])->where('role', 'saksi')->where('district_id', $request->district_id)->where('village_id', $request->village_id)->get();

        return Excel::download(new Saksi($users), 'saksi.xlsx');
    }
}
