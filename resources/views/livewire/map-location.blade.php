<div>
    <div id='map' style='width: 1000px; height: 500px; margin:auto'></div>
    <!-- <div id='data' style='width: 1000px; height: 500px; margin:auto' >
<table class="table" style="margin-top: 30px;">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">latitude</th>
      <th scope="col">longitude</th>
      <th scope="col">RSSI</th>
      <th scope="col">SNR</th>
      <th scope="col">Packet Loss</th>
      <th scope="col">Delay</th>
      <th scope="col">Timestamp</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div> -->
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
    const loadLocations = (geoJson) => {
       geoJson.features.forEach((location) => {
            const {geometry, properties} = location
            const {iconSize, locationId} = properties

            let markerElement = document.createElement('div')
            markerElement.className = 'marker' + locationId
            markerElement.id = locationId
            markerElement.style.backgroundImage = 'url(https://cdn1.iconfinder.com/data/icons/social-messaging-ui-color/254000/66-512.png)'
            markerElement.style.backgroundSize = 'cover'
            markerElement.style.width = '50px'
            markerElement.style.height = '50px'

            
            new mapboxgl.Marker(markerElement)
            .setLngLat(geometry.coordinates)
            .addTo(map)
        })
    }

    loadLocations({!! $geoJson !!})
})

</script>
    
@endpush

