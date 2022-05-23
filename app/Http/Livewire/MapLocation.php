<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;


class MapLocation extends Component
{
    public $locationId,$longitude,$latitude;
    public $geoJson;
    public $idEdit = false;

    private function loadLocation(){
        $maps = DB::table('data_gps') ->orderBy('id_gps', 'desc')->get();

        $custom = [];

        foreach($maps as $maps){
            $custom[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$maps-> longitude, $maps->latitude],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $maps->id_gps
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $custom
        ];
        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
    }
    public function render()
    {
        $this->loadLocation();
        return view('livewire.map-location');
    }
}
