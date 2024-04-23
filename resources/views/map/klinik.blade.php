
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
            height: 100%;
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
</div>

@endsection
@section('js')
<script>
    // Function to initialize the map with user's current location
    function initializeMap(latitude, longitude) {
        // Create a map object and set its view to the user's current location
        var mymap = L.map('mapid').setView([latitude, longitude], 13);

        // Add OpenStreetMap as the base layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        // Add a marker to the map at the user's current location
        var marker = L.marker([latitude, longitude]).addTo(mymap);

        // Add a popup to the marker
        marker.bindPopup("<b>Lokasi Anda</b>").openPopup();

        var customIcon = L.icon({
            iconUrl: '/images/clinic.png',
            iconSize: [50, 38], // size of the icon
            iconAnchor: [15, 15], // point of the icon which will correspond to marker's location
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        // Add another marker to the map at a specific location
        @foreach ($clinics as $item)
            var anotherMarker = L.marker([{{ $item->latitude }}, {{ $item->longitude }}], {
                icon: customIcon
            }).addTo(mymap);
            anotherMarker.openPopup();
        @endforeach

    }

    // Function to handle the successful retrieval of user's current location
    function success(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Initialize the map with user's current location
        initializeMap(latitude, longitude);
    }

    // Function to handle errors during retrieval of user's current location
    function error() {
        alert('Unable to retrieve your location. Please allow access to your location.');
    }

    // Check if geolocation is supported by the browser
    if (navigator.geolocation) {
        // Request the user's current location
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        alert('Geolocation is not supported by your browser.');
    }
</script>
@endsection
