<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Climate;
use App\Models\Weathercode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Climate::where('id','>=',1)->delete();
        $json = file_get_contents(public_path('json'). '/Climate.json');
        $data = json_decode($json);
        foreach ($data->Climate as $item){
            Climate::create(array(
                'climate' => $item->climate,
                'city' => $item->city,
                'temperature' => $item->temperature,
                'weather_icons' => $item->weather_icons,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
        ));
        }
        Weathercode::where('id','>=',1)->delete();
        $json = file_get_contents(public_path('json'). '/Climate.json');
        $data = json_decode($json);
        foreach ($data->Weathercode as $item){
            Weathercode::create(array(
                'id' => $item->id,
                'Condition' => $item->Condition
        ));
        }

    }
}
