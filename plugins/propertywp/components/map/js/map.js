var map;
var mapMarkers = [];

var element;
var lat = 4.7129553145829695;
var lng = -74.08241225035823;
var zoom = 6;
var iconUrl;

class Maps {
    constructor(idElement ,latitud, longitud, z) {
        element = idElement;
        lat = latitud;
        lng = longitud;
        zoom = z;
    }
    iconMarkers( url ){
        iconUrl = url;
    }
}

/* testing data */
var setupMap = new Maps('prop-map',4.7129553145829695,-74.08241225035823,6);
setupMap.iconMarkers('https://images.vexels.com/media/users/3/128066/isolated/preview/5940a70160831672d35888200bbac868-home-location-pointer-icon-by-vexels.png');

/* Properties data test */
var prop = [
    {
        title : 'title property1',
        coordinates: {
            lat: 6.248806161175757,
            lng: -75.5733178382851,
        }
    },
    {
        title : 'title property2',
        coordinates: {
            lat: 4.7129553145829695,
            lng: -75.5733178382851,
        }
    },
    {
        title : 'title property3',
        coordinates: {
            lat: 3.4310468223036525,
            lng: -75.5733178382851,
        }
    },
    {
        title : 'title property4',
        coordinates: {
            lat: 3.4310468223036525,
            lng: -76.5181131172518,
        }
    },
];
/* end Properties test */

/* init map class */
function initMap(){

    map = new google.maps.Map(document.getElementById(element), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: zoom
    });

    populateMap(prop);
}

function populateMap( properties ) {

    console.log( mapMarkers )

    if( mapMarkers.length >= 1 ) {
        mapMarkers.forEach( function( marker ) {
            marker.setMap(null) // removes marker from map
        });
        mapMarkers.length = 0; // delete all existing markers from reference
    }

    if( properties.length == 0 ) {
        console.log('no properties to put on map');
        return;
    }

    addMarkers( properties );

}


function addMarkers( properties ) {

    properties.forEach( function( property ) {

        var marker = false;
        var latLng = false;
        var title = property.title;

        if( property.coordinates.lat && property.coordinates.lng ) {

            console.log('has coordinates for map');
            console.log( property.coordinates.lat )
            console.log( property.coordinates.lng )

            var latLng = {
                lat: parseFloat( property.coordinates.lat ),
                lng: parseFloat( property.coordinates.lng )
            };
        } else {

            var latLng = {
                lat: 4.7129553145829695,
                lng: -74.08241225035823
            };

        }

        var iconBase;
        if (iconUrl) {
            iconBase = {
                url: iconUrl,
                size: new google.maps.Size(70, 70),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
        }

        if( latLng ) {

            var marker = new google.maps.Marker({
                position: latLng,
                title: title,
                //icon: iconBase ,
            });
            if (iconUrl) {
                marker.setIcon(iconBase)
            }

            mapMarkers.push( marker );

        }


        /* infoboxes */
        var infoBoxContent = '';
        infoBoxContent += '<a class="pwp-infobox" href="#">';
        infoBoxContent += '<h2>Title</h2>';
        infoBoxContent += '<img src="https://picsum.photos/200/200" />';
        infoBoxContent += '<h3>Map Address</h3>';
        infoBoxContent += '<hr />';
        infoBoxContent += '<h4>Listing Type</h4>';
        infoBoxContent += '</a>';

        var infowindow = new google.maps.InfoWindow({
            content: infoBoxContent
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        google.maps.event.addListener(map, "click", function(event) {
            infowindow.close();
        });

        // add marker to map
        if( marker ) {
            marker.setMap(map);
        }

    });

}

