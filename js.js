var map;
var map_marks;

var regions =
    {
        'minsk': {lat: 53.8978979, lng: 27.5223145, zoom: 11},
        'saviecki': {lat: 53.9388905, lng: 27.5431671, zoom: 12.75},
        'pyershamayski': {lat: 53.9300958, lng: 27.623531, zoom: 12.75},
        'partyzanski': {lat: 53.9019076, lng: 27.5969985, zoom: 13},
        'zavodski': {lat: 53.8498558, lng: 27.6327213, zoom: 12},
        'lyeninski': {lat: 53.8686367, lng: 27.5189581, zoom: 12},
        'maskouski': {lat: 53.8712811, lng: 27.4164494, zoom: 12},
        'frunzyenski': {lat: 53.8981178, lng: 27.3965984, zoom: 12.5},
        'centralny': {lat: 53.9343415, lng: 27.4344149, zoom: 12},
        'kastrycnicki': {lat: 53.851579, lng: 27.475549, zoom: 12}
    }
;

var reg_marks = {
    'saviecki': [
        {label: 'A', lat: 53.8978879, lng: 27.5223345, content: '<p class="content">Описание А</p>'},
        {label: 'B', lat: 53.8978879, lng: 27.5223345, content: '<p class="content">Описание А</p>'}
    ],
};

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(regions['minsk'].lat, regions['minsk'].lng),
        zoom: regions['minsk'].zoom,
        disableDefaultUI: false,
        scrollwheel: true,
    });
}

$(document).ready(function () {
    $('.select-wrapper select').on('change', function (e) {
        if(map_marks) {
            map_marks.forEach(function (item) {
                item.setMap(null);
            });
        }
        let region = regions[e.target.value];
        if (!region) {
            region = regions['minsk'];
        }
        map.setCenter(new google.maps.LatLng(region.lat, region.lng));
        map.setZoom(region.zoom);

        let marks_arr = reg_marks[e.target.value];
        if(marks_arr) {
            map_marks = marks_arr.map(function (item) {
                let marker = new google.maps.Marker({
                    position: {lat: item.lat, lng: item.lng},
                    label: item.label,
                    animation: google.maps.Animation.DROP,
                    map: map,
                });
                let infowindow = new google.maps.InfoWindow({
                    content: item.content
                });
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
                return marker;
            });
        }
    });
});