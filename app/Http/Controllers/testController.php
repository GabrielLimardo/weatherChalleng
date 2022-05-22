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

        $climate = Climate::where('city','LIKE','%'.$req->city.'%')->first();
        if ($climate) {
            $startTime = Carbon::now();
            $finishTime = Carbon::parse($climate->updated_at);
            $total = $finishTime->diff($startTime)->format('%H');
            if ( $total > 1 ) {
                $response = Http::get('http://api.weatherstack.com/current?access_key=c95fbe66b132eeb3c4a2068bc1601b80&query='.$req->city);
                $climat = $response['current']['weather_code'];
                $climate->climate =  $climat;
                $climate->city = $req->city;
                $climate->temperature =  $response['current']['temperature'];
                $climate->weather_icons = $response['current']['weather_icons'][0];
                $climate->updated_at = $startTime;
                $climate->save();
                $Weather = Weathercode::where('id', $climat)->first();

                return view('index',['city'=>$req->city,'climate'=> $Weather->Condition, 'temperature'=> $response['current']['temperature'], 'weather_icons'=> $response['current']['weather_icons'][0]]);
            }
            $Weather = Weathercode::where('id', $climate->climate)->first();
            return view('index',['city'=>$req->city,'climate'=> $Weather->Condition, 'temperature'=> $climate->temperature , 'weather_icons'=> $climate->weather_icons ]);
        }else {
                $response = Http::get('http://api.weatherstack.com/current?access_key=c95fbe66b132eeb3c4a2068bc1601b80&query='.$req->city);
                $climat = $response['current']['weather_code'];
                 Climate::create([
                    'climate' => $climat,
                    'city' => $req->city,
                    'temperature' =>  $response['current']['temperature'],
                    'weather_icons' => $response['current']['weather_icons'][0]
                ]);
            $Weather = Weathercode::where('id', $climat)->first();
            return view('index',['city'=>$req->city,'climate'=> $Weather->Condition, 'temperature'=> $response['current']['temperature'], 'weather_icons'=> $response['current']['weather_icons'][0]]);
        }


    }




}
