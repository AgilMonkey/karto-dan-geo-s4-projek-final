<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            /* Merge borders */
        }

        td {
            padding: 5px;
        }

        .container {
            display: flex;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-layout>
</x-layout>

<body>
    <div class="p-4">

        <div class="container">
            <div id="map" style="width: 600px; height: 400px;"></div>
            <div>
                <table>
                    <tr style="font-weight: bold;">
                        <td>Nama</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>Agil</td>
                        <td>Hadir</td>
                    </tr>
                </table>
            </div>
        </div>
        <button type="button">Datang</button>
        <button type="button">Pulang</button>
        <div class="info">
            <p id="latitude">Latitude: </p>
            <p id="longitude">Longitude: </p>
        </div>

    </div>

    <script>
        const POLIBAN_CORDS = [-3.2959108, 114.5823674];

        const map = L.map('map', {
            zoom: 20
        });

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        //  poliban area
        L.circle(POLIBAN_CORDS, {
            radius: 220,
            color: 'red'
        }).addTo(map);

        map.locate({
            setView: true,
            maxZoom: 20
        });

        function onLocationFound(e) {
            var lat = e.latlng.lat;
            var lon = e.latlng.lng;

            map.setView([lat, lon], 17);

            L.marker(e.latlng).addTo(map)

            document.getElementById('latitude').textContent = 'Latitude: ' + lat;
            document.getElementById('longitude').textContent = 'Longitude: ' + lon;
        }

        map.on('locationfound', onLocationFound);

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationerror', onLocationError);
    </script>

</body>

</html>
