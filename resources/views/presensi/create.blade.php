@extends('layouts.presensi')
@section('header')

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">E-Presensi</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection
@section('content')
<style>
    .webcam-capture,
    .webcam-capture video {
        width: 100% !important;
        height: auto !important;
        margin: auto;
        border-radius: 15px;
        display: inline-block;
    }

    #map {
        height: 180px;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="row" style="margin-top: 70px;">
    <div class="col">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        @if ($cek > 0)
        <button id="takeabsen" class="btn btn-danger btn-block">
            <ion-icon name="barcode-outline"></ion-icon>
            Presensi Pulang</button>
    </div>
    @else
    <button id="takeabsen" class="btn btn-primary btn-block">
        <ion-icon name="barcode-outline"></ion-icon>
        Presensi Masuk</button>
</div>
@endif

</div>
<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>
<audio id="notifikasi_in">
    <source src="{{ asset('assets/voice/voice_alert_in2.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasi_out">
    <source src="{{ asset('assets/voice/voice_alert_out.mp3')}}" type="audio/mpeg">
</audio>
<audio id="radius_denied">
    <source src="{{ asset('assets/voice/voice_radius_denied.mp3')}}" type="audio/mpeg">
</audio>
@endsection
@push('myscript')
<script>
    var notifikasi_in = document.getElementById('notifikasi_in');
    var notifikasi_out = document.getElementById('notifikasi_out');
    var radius_denied = document.getElementById('radius_denied');

    Webcam.set({
        width: 480,
        height: 640,
        image_format: 'jpeg',
        jpeg_quality: 80,
        constraints: {
            facingMode: {
                ideal: 'environment'
            }
        },
    });
    Webcam.attach('.webcam-capture');

    var lokasi = document.getElementById('lokasi');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

    }

    function successCallback(position) {
        lokasi.value = position.coords.latitude + ', ' + position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 17);
        var lokasi_kantor = "{{ $lok_kantor -> lokasi_kantor}}";
        var lok = lokasi_kantor.split(',');
        var lat_kantor = lok[0];
        var long_kantor = lok[1];
        var radius = "{{$lok_kantor -> radius}}";

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

        var circle = L.circle([lat_kantor, long_kantor], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);

    }

    function errorCallback(error) {

    }

    $('#takeabsen').click(function() {
        Webcam.snap(function(uri) {
            image = uri;
        });
        var lokasi = document.getElementById('lokasi').value;

        $.ajax({
            type: 'POST',
            url: '/presensi/store',
            data: {
                _token: '{{ csrf_token() }}',
                image: image,
                lokasi: lokasi
            },
            cache: false,
            success: function(respond) {
                var status = respond.split("|");
                if (status[0] == 'success') {
                    if (status[2] == 'in') {
                        notifikasi_in.play();
                    } else if (status[2] == 'out') {
                        notifikasi_out.play();
                    }
                    Swal.fire({
                        title: 'Berhasil',
                        text: status[1],
                        icon: 'success',
                    })
                    setTimeout('location.href="/dashboard"', 3000);
                } else {
                    if (status[2] == 'radius') {
                        radius_denied.play();
                    }
                    Swal.fire({
                        title: 'Gagal',
                        text: status[1],
                        icon: 'error',
                        confirmButtonText: 'Lanjutkan'
                    })
                }
            }
        });
    });
</script>
@endpush