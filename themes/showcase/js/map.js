jQuery(document).ready(function($) {
    /* testing data map */

    /* json style testing */
    var jsonStyle = [
        {
            "featureType": "road",
            "stylers": [
                {
                    "color": "#e29841"
                }
            ]
        }
    ];

    /* Properties data test */
    var prop = [
        {
            title: 'title property1',
            coordinates: {
                lat: 6.248806161175757,
                lng: -75.5733178382851,
            }
        },
        {
            title: 'title property2',
            coordinates: {
                lat: 4.7129553145829695,
                lng: -75.5733178382851,
            }
        },
        {
            title: 'title property3',
            coordinates: {
                lat: 3.4310468223036525,
                lng: -75.5733178382851,
            }
        },
        {
            title: 'title property4',
            coordinates: {
                lat: 3.4310468223036525,
                lng: -76.5181131172518,
            }
        },
    ];

    var setupMap = new Maps('prop-map', 4.7129553145829695, -74.08241225035823, 6);
    setupMap.iconMarkers('https://images.vexels.com/media/users/3/128066/isolated/preview/5940a70160831672d35888200bbac868-home-location-pointer-icon-by-vexels.png');
    setupMap.jsonStyle(jsonStyle);
    setupMap.setProperty(prop);
    //init map
    setupMap.init();

    /* testing data map */
});