var map;
var map_marks;

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
        $('.marks-block').removeClass('active');
        $('#' + e.target.value).addClass('active');
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

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.marks-block .badge').dblclick(function(e){
        let id = $(e.target).closest('.marks-block').attr('id');
        let key = e.target.dataset['key'];
        if(reg_marks[id] && reg_marks[id][key]){
            let mark = reg_marks[id][key];
            map.setCenter(new google.maps.LatLng(mark.lat, mark.lng));
            map.setZoom(16);
        }
    });
});