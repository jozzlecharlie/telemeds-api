<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hperson;

class PatientController extends Controller
{
    public function __invoke()
    {
        $all = Hperson::filter()->get();
        return response()->json($all);
    }
}
