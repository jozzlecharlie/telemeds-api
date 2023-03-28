<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hperson;

class PatientController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!isset($request->limit)) {
            return response()->json(
                'Limit is required', 400
            );
        }

        $patients = Hperson::filter()->get();
        return response()->json($patients);
    }
}
