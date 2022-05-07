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
    mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [99.148474, 2.383970], // starting position [lng, lat]
        zoom: 15 // starting zoom
    });

    const marker = new mapboxgl.Marker({
        color: "#FFFFFF",
        draggable: true
    }).setLngLat([99.148474, 2.383970])
        .addTo(map);
    </script>
@endpush

