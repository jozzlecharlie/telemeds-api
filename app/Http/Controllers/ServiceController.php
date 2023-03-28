<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Htypser;


class ServiceController extends Controller
{
    public function __invoke()
    {
        $services = Htypser::filter()->get();

        return response()->json($services);
    }
}
