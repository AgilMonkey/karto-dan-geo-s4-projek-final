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
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                                {{ $row->nama }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $row->waktu }}
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $row->status }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="inline-flex flex-col">

                    <div class="m-2 flex gap-4">
                        <x-button id="datangButton">Datang</x-button>
                        <x-button id="pulangButton">Pulang</x-button>
                        <form id="datangForm" method="POST" action={{ route('datang') }}>
                            @csrf
                        </form>
                        <form id="pulangForm" method="POST" action={{ route('pulang') }}>
                            @csrf
                        </form>
                    </div>

                    <div id="absenError" class="text-red-500 text-sm mt-1"></div>

                </div>

            </div>

        </div>

    </div>


    <script>
        document.getElementById('datangButton').addEventListener('click', function(event) {
            event.preventDefault();
            if (isInsidePoliban()) {
                document.getElementById('datangForm').submit();
            }
            else {
                document.getElementById('absenError').textContent = "sedang tidak di kampus!";
            }
        });
        document.getElementById('pulangButton').addEventListener('click', function(event) {
            event.preventDefault();
            if (isInsidePoliban()) {
                document.getElementById('pulangForm').submit();
            }
            else {
                document.getElementById('absenError').textContent = "sedang tidak di kampus!";
            }
        });

        const POLIBAN_CORDS = [-3.2959108, 114.5823674];

        var pos = [0, 0];

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
            var latlng = e.latlng;
            pos = [latlng.lat, latlng.lng];
            // pos = [-3.2959108 + 0.0010, 114.5823674 + 0.0001]

            var lat = pos[0];
            var lon = pos[1];

            map.setView([lat, lon], 17);

            L.marker(pos).addTo(map)
        }

        map.on('locationfound', onLocationFound);

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationerror', onLocationError);


        function isInsidePoliban() {
            var latlng = pos;
            var poliban_radius = 0.002;
            var pol_to_cur_pos = [latlng[0] - POLIBAN_CORDS[0], latlng[1] - POLIBAN_CORDS[1]];
            var length = Math.sqrt(Math.pow(pol_to_cur_pos[0], 2) + Math.pow(pol_to_cur_pos[1], 2));

            if (length < poliban_radius) {
                return true;
            }

            return false;
        }
    </script>

</body>

</html>
