<style>
    #map {
        height: 180px;
    }
</style>
<div id="map"></div>

<script>
    var lokasi = "{{ $presensi->lokasi_in }}";
    var lok = lokasi.split(",");

    var latitude = parseFloat(lok[0]);
    var longitude = parseFloat(lok[1]);

    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([latitude, longitude])
        .addTo(map)
        .bindPopup("Lokasi Presensi");

    L.circle([-3.3527008261004894, 114.62840365571842], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: '0.5',
        radius: 20
    }).addTo(map);

    L.popup()
        .setLatLng([latitude, longitude])
        .setContent("{{$presensi -> nama_lengkap}}")
        .openOn(map);

    // Memperbaiki ukuran tampilan peta
    setTimeout(function() {
        map.invalidateSize();
    }, 500);
</script>