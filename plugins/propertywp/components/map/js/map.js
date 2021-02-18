var map;
var mapMarkers = [];

var element;
var lat = 4.7129553145829695;
var lng = -74.08241225035823;
var zoom = 6;
var iconUrl;
var JSONstyle;
var mapProperties;

class Maps {
    constructor(idElement ,latitud, longitud, z) {
        element = idElement;
        lat = latitud;
        lng = longitud;
        zoom = z;

    }
    init(){
        initMap();
    }
    iconMarkers( url ){
        iconUrl = url;
    }
    jsonStyle( styles ){
        JSONstyle = styles
    }
    setProperty( prop ){
        mapProperties = prop
    }
}


/* init map class */
function initMap(){

    map = new google.maps.Map(document.getElementById(element), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: zoom,
        mapTypeControl: true,
        mapTypeControlOptions: {
            mapTypeIds: ["roadmap", "satellite", "hybrid", "terrain", "styled_map"],
        },
    });

    /* style custom map */
    if (JSONstyle){
        const styledMapType = new google.maps.StyledMapType(JSONstyle,{ name: "Styled Map" });
        map.mapTypes.set("styled_map", styledMapType);
        map.setMapTypeId("styled_map");
    }

    /* init Populate map */
    if (mapProperties){
        populateMap(mapProperties);
    }

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
                lat: lat,
                lng: lng
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

