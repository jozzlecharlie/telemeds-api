<?php

namespace App\Http\Controllers;
use App\Traits\EncounterGenerator;
use Illuminate\Http\Request;
use App\Models\{Hperson,Htypser,Hopdlog};

class EncounterController extends Controller
{
    use EncounterGenerator;

    public function generate(Request $request){
        //$hpercode, $tscode, $priority, $teleconsultation)
        $validated = $request->validate([
            'hpercode' => 'required',
            'tscode' => 'required',
            'priority' => 'required|in:0,1',
            'teleconsultation' => 'required',
        ]);//return 422 if validation fails

     $patient = Hperson::find($validated['hpercode']);
     if(!$patient){
        return response()->json('Patient Not found', 404);
     }

    $service = Htypser::find($validated['tscode']);
    if(!$service){
        return response()->json('Service Not found', 404);
    }
        $enccode = $this->generateEncounter(
            $validated['hpercode'],
            $validated['tscode'],
            $validated['priority'],
            $validated['teleconsultation'],
         );

         if(!$enccode) {
            return response()->json([
                'message' => 'Failed to generate encounter',
            ], 500);
        }
        return response()->json(Hopdlog::find($enccode),201);
    }

    public Function index(Request $request){


        if(!isset($request->like)){
            return  response()->json('Like is required', 422);
        }
        $hpersonal = $request->user()->hpersonal;
        $encounters = Hopdlog::where('tscode', $hpersonal->deptcode)
            ->orderBy('opddate')
            ->filter()
            ->get();

            return  response()->json($encounters);
    }
}
