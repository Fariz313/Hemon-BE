
@extends('template')

@section('title', $title)
@section('user_name', $user->name)
@section('add_head_script')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        /* Set the size of the map container */
        #mapid {
            height: 75%;
        }
        .containermap{
            height: 100vh;
            width: 100vw;
            position: fixed
        }
    </style>
@endsection
@section('content')
<div class="containermap">
    <div id="mapid"></div>
<div id="distance"></div>

</div>

@endsection
@section('js')

<script>
    var map = L.map('mapid').setView([51.505, -0.09], 13);
    var startPoint = null;
    var distance = 0;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function success(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        console.log("current",latitude,longitude);

        if (!startPoint) {
            startPoint = L.latLng(latitude, longitude);
        } else {
            var endPoint = L.latLng(latitude, longitude);
            distance += startPoint.distanceTo(endPoint); // Calculate distance between points
            startPoint = endPoint; // Set the new starting point
            updateDistance(distance);
        }

        // Center map on user's current location
        map.setView([latitude, longitude]);
        // Add a marker at the user's current location
        L.marker([latitude, longitude]).addTo(map);
    }

    function updateDistance(distance) {
        var distanceInKm = distance / 1000; // Convert meters to kilometers
        document.getElementById('distance').innerHTML = 'Total distance: ' + distanceInKm.toFixed(2) + ' km';
    }

    function error() {
        alert('Unable to retrieve your location.');
    }

    function trackLocation() {
        if (navigator.geolocation) {
            // Request the user's current location every 5 seconds
            navigator.geolocation.getCurrentPosition(success, error);
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    }

    // Start tracking location immediately and then every 5 seconds
    trackLocation();
    setInterval(trackLocation, 5000); // 5000 milliseconds = 5 seconds
</script>
@endsection
