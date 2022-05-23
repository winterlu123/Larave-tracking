<div>
    <div id='map' style='width: 1000px; height: 500px; margin:auto'></div>
</div>
@push('scripts')
<script>

    document.addEventListener('livewire:load', () => {
    mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [99.148474, 2.383970], // starting position [lng, lat]
        zoom: 15 // starting zoom
    });

    map.on('load', function () {
    map.addSource('route', {!! $geoo !!});
    map.addLayer({
    'id': 'route',
    'type': 'line',
    'source': 'route',
    'layout': {
    'line-join': 'round',
    'line-cap': 'round'
    },
    'paint': {
    'line-color': '#00FFFF',
    'line-width': 8
    }
    });
    });

    map.addControl(new mapboxgl.NavigationControl())


    var to = {!! $last !!} //lng, lat
    var from = {!! $first !!}//lng, lat 

      var greenMarker = new mapboxgl.Marker({
          color: 'green'
        })
        .setLngLat(to) // marker position using variable 'to'
        .addTo(map); //add marker to map

      var purpleMarker = new mapboxgl.Marker({
          color: 'purple'
        })
        .setLngLat(from) // marker position using variable 'from'
        .addTo(map); //add marker to map

      var options = {
        units: 'kilometers'
      }; 

      var distance = turf.distance(to, from, options);

      var value = document.getElementById('jarak').value = + distance.toFixed([2])
})
</script>
    
@endpush

