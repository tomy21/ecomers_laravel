@extends('ecommers.Layout.index')

@section('content')
    <div class="kontak-kami">
        <h3>{{ $name }}</h3>
        <div class="card-kontak-kami">
            <div class="card-kontak">
                <div style="width:100%;height:500px;border-radius:10px;" id="googleMap"></div>
            </div>
            <div class="description">
                <div class="desc-head">
                    <h2>Superindo Harapan Kita</h2>
                </div>
                <div class="desc-address">
                    <address>
                        Bencongan Indah, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810
                    </address>
                </div>
                <div class="desc-tlp">
                    <i class="fas fa-phone-alt"></i>
                    <p> 0812 - xxxx - xxxxx</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-6.216279396280251, 106.60089955973308),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            // membuat Marker
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-6.216279396280251, 106.60089955973308),
                map: peta,
                animation: google.maps.Animation.BOUNCE
            });

        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
