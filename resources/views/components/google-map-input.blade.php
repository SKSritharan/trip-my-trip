<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css" />
    <style>
        #maps-location-search {
            width:500px;
        }

        #maps-location-search {
            width:500px;
        }
        #latitude {
            width:150px;
        }
        #longitude {
            width:150px;
        }
        .form {
            width:600px;
            margin:20px;
        }
        .form input {
            height: 20px;
        }
        .field {
            margin: 10px 0;
        }
        .error {
            color:red;
        }
    </style>

<form id="formMap" class="form" style="">
    <div class="field">
        <strong>Find Location: </strong>
        <input placeholder="Enter address or name of location to find on map" id="maps-location-search" type="text">
    </div>
    <div class="field">
        <strong>Marker Coordinates: </strong>
        <input type="text" id="latitude"> , <input type="text" id="longitude">
        <button type="button"onclick="clearMap();">Clear Coordinates</button>
    </div>
    <div class="element-map" id="gmaps-canvas" class="field" style="clear: both;height:295px;border: 1px solid #999;">
    </div>
    <div id="gmaps-error" class="error"></div>



</form>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_map_key', null)}}&v=3&sensor=false"></script>
<script>
    var geocoder;
    var map;
    var marker;
    var formName = 'formMap';
    var formLatitudeField = 'latitude';
    var formLongitudeField = 'longitude';
    var formSearchLocation = 'maps-location-search';
    var formErrorText = 'gmaps-error';
    var existingLat;
    var existingLng;

    // Initialize Google Maps
    function initialize_google_maps(){

        // If no lat/lng values, center the map marker on 0,0 coordinates
        if (existingLat == null) {
            var latlng = new google.maps.LatLng(0,0);
            var zoomLevel = 1;
        } else {
            var latlng = new google.maps.LatLng(existingLat,existingLng,true);
            var zoomLevel = 12;
        }

        // Set the options for the map
        var options = {
            zoom: zoomLevel,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Create the Google Maps Object
        map = new google.maps.Map(document.getElementById("gmaps-canvas"), options);

        // Create Google Geocode Object that will let us do lat/lng lookups based on address or location name
        geocoder = new google.maps.Geocoder();

        // Add marker. Set draggable to TRUE to allow it to be moved around the map
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: latlng
        });

        // Listen for event when marker is dragged and dropped
        google.maps.event.addListener(marker, 'dragend', function() {
            update_ui('', marker.getPosition(), true);
            $('#' + formErrorText).html('');
        });

        // Listen for event when marker is dropped (map clicked)
        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            update_ui(event.latLng.lat() + ', ' + event.latLng.lng(), event.latLng, true);
            $('#' + formErrorText).html('');
        });

        // Listen for map zoom changing
        google.maps.event.addListener(map, 'zoom_changed', function() {
            zoomChangeBoundsListener =
                google.maps.event.addListener(map, 'bounds_changed', function(event) {
                    if (this.getZoom() > 15 && this.initialZoom == true) {
                        // Change max/min zoom here
                        this.setZoom(15);
                        this.initialZoom = false;
                    }
                    google.maps.event.removeListener(zoomChangeBoundsListener);
                });
        });

        map.initialZoom = true;

    }

    // Moves the map marker to a given lat/lng and centers the map on that location
    function update_map( geometry ) {
        marker.setPosition(geometry.location);
        map.fitBounds(geometry.viewport);
    }

    // Updates form fields with address and/or lat/lng info
    function update_ui( address, latLng, plot ) {
        $('#' + formSearchLocation).autocomplete("close");

        // If we are plotting a point with the marker, we need to clear out
        // any text in location search.
        if (plot){
            $('#' + formSearchLocation).val('');
        }


        oFormObject = document.forms[formName];
        oFormLat = oFormObject.elements[formLatitudeField].value = latLng.lat();
        oFormLng = oFormObject.elements[formLongitudeField].value = latLng.lng();

    }

    // Query the Google geocode object
    //
    // type: 'address' for search by address
    //       'latLng'  for search by latLng (reverse lookup)
    //
    // value: search query
    //
    // update: should we update the map (center map and position marker)?
    function geocode_lookup( type, value, update ) {
        // default value: update = false
        update = typeof update !== 'undefined' ? update : false;

        request = {};
        request[type] = value;

        geocoder.geocode(request, function(results, status) {
            $('#' + formErrorText).html('');
            if (status == google.maps.GeocoderStatus.OK) {
                // Google geocoding has succeeded!
                if (results[0]) {
                    // Always update the UI elements with new location data
                    update_ui( results[0].formatted_address,
                        results[0].geometry.location,
                        false )

                    // Only update the map (position marker and center map) if requested
                    if( update ) { update_map( results[0].geometry ) }
                } else {
                    // Geocoder status ok but no results!?
                    $('#' + formErrorText).html("Sorry, something went wrong. Try again!");
                }
            } else {
                // Google Geocoding has failed. Two common reasons:
                //   * Address not recognised (e.g. search for 'zxxzcxczxcx')
                //   * Location doesn't map to address (e.g. click in middle of Atlantic)

                if( type == 'address' ) {
                    // User has typed in an address which we can't geocode to a location
                    $('#' + formErrorText).html("Google could not find " + value + ". Try a different search term, or click the map to manually select a location." );
                }
            };
        });
    };

    $(document).ready(function() {

        if( $('#gmaps-canvas').length  ) {


            initialize_google_maps();

            $('#' + formSearchLocation).autocomplete({

                // source is the list of input options shown in the autocomplete dropdown.
                // see documentation: http://jqueryui.com/demos/autocomplete/
                source: function(request,response) {

                    // the geocode method takes an address or LatLng to search for
                    // and a callback function which should process the results into
                    // a format accepted by jqueryUI autocomplete
                    geocoder.geocode( {'address': request.term }, function(results, status) {
                        response($.map(results, function(item) {
                            return {
                                label: item.formatted_address, // appears in dropdown box
                                value: item.formatted_address, // inserted into input element when selected
                                geocode: item                  // all geocode data
                            }
                        }));
                    })
                },

                // event triggered when drop-down option selected
                select: function(event,ui){
                    update_ui(  ui.item.value, ui.item.geocode.geometry.location )
                    update_map( ui.item.geocode.geometry )
                }

            });

            // triggered when user presses a key in the address box
            $('#' + formSearchLocation).bind('keydown', function(event) {
                if(event.keyCode == 13) {
                    geocode_lookup( 'address', $('#' + formSearchLocation).val(), true );

                    // ensures dropdown disappears when enter is pressed
                    $('#' + formSearchLocation).autocomplete("disable")
                } else {
                    // re-enable if previously disabled above
                    $('#' + formSearchLocation).autocomplete("enable")
                }
            });



        };

    });

    function clearMap() {

        $('#' + formLatitudeField).val(null);
        $('#' + formLongitudeField).val(null);
        $('#' + formSearchLocation).val(null);
        $('#' + formErrorText).html('');

        var latLng = new google.maps.LatLng(0,0);
        var bounds = new google.maps.LatLngBounds(latLng);

        marker.setPosition(latLng);
        map.setZoom(1);
    }
</script>
