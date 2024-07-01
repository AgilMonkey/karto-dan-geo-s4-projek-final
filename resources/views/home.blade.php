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
            width: 600px;
            height: 400px;
            min-width: fit-content;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-layout>
</x-layout>

<body>
    <div class="w-fit container mx-auto">

        <div class="w-fit p-4">

            <div class="w-fit">

                <div class="flex flex-col lg:flex-row gap-5">

                    <div id="map" class=""></div>

                    <div class="">
                        <div class="h-48 overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-fit divide-y-2 divide-gray-200 bg-white text-sm">
                                <thead class="ltr:text-left rtl:text-right">
                                    <tr>
                                        <th class:="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            Waktu
                                        </th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($data as $row)
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $row->nama }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $row->waktu }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $row->status }}</td>
                                    @endforeach
                                    <tr>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="inline-flex flex-col">

                    <div class="m-2 flex gap-4">
                        <form method="POST" action="/datang">
                            @csrf
                            <x-button>Datang</x-button>
                        </form>
                        <form method="POST" action="/pulang">
                            @csrf
                            <x-button>Pulang</x-button>
                        </form>
                    </div>

                </div>

            </div>

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
