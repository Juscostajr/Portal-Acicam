/**
 * Created by Juscelino Jr on 26/04/2016.
 */
function initMap() {
    var myLatLng = {lat: -24.0460049, lng: -52.3787175};

    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 16
    });

    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: myLatLng
    });

    var infowindow = new google.maps.InfoWindow({
        content: '<strong>ACICAM</strong><br>Av. Irmãos Pereira,963<br>'
    });
}
