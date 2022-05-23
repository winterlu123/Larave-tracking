<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class RuteLocation extends Component
{   
    public $lng, $lat;
    public $geoo;
    public $id_gps;
    public $first;
    public $last;
    public $jarak;
    public $updateMode = false;

    
    private function load(){
        $full = DB::table('data_gps')
        ->select('id_gps', 'longitude', 'latitude')
        ->get();

        try{
            $first = DB::table('data_gps')
            ->select('latitude', 'longitude')
            ->orderBy('id_gps', 'ASC')
            ->take(1)
            ->get();

            $last = DB::table('data_gps')
            ->select('latitude', 'longitude')
            ->orderBy('id_gps', 'DESC')
            ->take(1)
            ->get();
        }
        catch (\Exception $ex){

        }

        $customRute = [];
        $coordinate = [];

        foreach($full as $r){
            $coordinate[] = [
                $r->longitude, $r->latitude
            ];
        }

        try {
            foreach($first as $f){
                $firstloop = [
                    $f->longitude, $f->latitude
                ];
            }
            foreach($last as $l){
                $lastloop = [
                    $l->longitude, $l->latitude
                ];
            }
        }
        catch(\Exception $ex){
            
        }

        $customRute = [
            'type' => 'Feature',
            'properties' => '{}',
            'geometry' => [
                'type' => 'LineString',
                'coordinates' => $coordinate
            ]
        ];

        $geoRute = [
            'type' => 'geojson',
            'data' => $customRute
        ];

        try{
            $first = collect($firstloop)->toJson();
            $last = collect($lastloop)->toJson();
        }
        catch(\Exception $ex){
        }
        $geoo = collect($geoRute)->toJson();
        $this->geoo = $geoo;
        $this->first = $first;
        $this->last = $last;
    }

    public function render()
    {
        $this->load();
        return view('livewire.rute-location');
    }
}
