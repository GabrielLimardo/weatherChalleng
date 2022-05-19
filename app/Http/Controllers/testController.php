<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Climate;
use App\Models\Weathercode;
use \Carbon\Carbon;

class testController extends Controller
{

    public function index(Request $req){

        date_default_timezone_set("America/Argentina/Buenos_Aires");
        if (Climate::where('city',$req->city)->count()> 0) {
            $climate = Climate::where('city',$req->city)->first();
            $startTime = Carbon::now();
            $finishTime = Carbon::parse($climate->updated_at);
            $total = $finishTime->diff($startTime)->format('%H');
            if ( $total > 1 ) {
                $response = Http::get('http://api.weatherstack.com/current?access_key=c95fbe66b132eeb3c4a2068bc1601b80&query='.$req->city);
                $climat = $response['current']['weather_code'];
                $climate->climate =  $climat;
                $climate->city = $req->city;
                $climate->updated_at = $startTime;
                $climate->save();
                $Weather = Weathercode::where('id', $climat)->first();
                return response()->json(['city'=>$req->city,'climate'=> $Weather->Condition]);
            }
            $Weather = Weathercode::where('id', $climate->climate)->first();
            return response()->json(['city'=>$req->city,'climate'=> $Weather->Condition ]);

        }else {
                $response = Http::get('http://api.weatherstack.com/current?access_key=c95fbe66b132eeb3c4a2068bc1601b80&query='.$req->city);
                $climate = $response['current']['weather_code'];
                 Climate::create([
                    'climate' => $climate,
                    'city' => $req->city,
                ]);
        }


    }




}
