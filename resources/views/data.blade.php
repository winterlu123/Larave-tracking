@extends('layouts.app')

@section('content')
<div id='data' style='width: 1000px; height: 500px; margin:auto' >
<table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">latitude</th>
      <th scope="col">longitude</th>
      <th scope="col">RSSI</th>
      <th scope="col">SNR</th>
      <th scope="col">Packet Loss</th>
      <th scope="col">Delay</th>
      <th scope="col">Date & Time</th>
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
</div>
@endsection
