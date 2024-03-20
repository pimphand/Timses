<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show(Request $request)
    {
        if (auth()->user()->role != null) {
            return abort(401);
        }

        if ($request->images) {
            $path = storage_path($request->images);

            return response()->file($path);
        }

        return abort(401);
    }
}
