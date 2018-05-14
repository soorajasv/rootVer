<?php 
    header("Content-type: text/html; charset=utf-8；");
    include  "getData.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Melbourne Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../img/loader3.gif) center no-repeat #fff;
        }

        .shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script>
        $(window).load(function() {

            //$(".se-pre-con").fadeOut("slow");;
            setTimeout(function() {
                $(".se-pre-con").fadeOut('slow', function() {});
            }, 800);
        });
    </script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" />

    <title>Helping Hands</title>





    <!-- files for google map application -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.klokantech.com/maptilerlayer/v1/index.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

    <script src="MapStyle.js" type="text/javascript"></script>
    <script src="CenterControl.js" type="text/javascript"></script>
    <script src="HomePageControl.js" type="text/javascript"></script>
    <script src="handleLocationError.js" type="text/javascript"></script>
    <script src="filterMarkers.js" type="text/javascript"></script>
    <script src="filterSuburbs.js" type="text/javascript"></script>
    <script src="DirectionHandling.js" type="text/javascript"></script>
    <script src="LocateControl.js" type="text/javascript"></script>

    <script src="./jquery-csv-master/src/jquery.csv.min.js"></script>
    <script src="./jquery-csv-master/src/jquery.csv.js"></script>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="./PapaParse/papaparse.min.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="application.css" rel="stylesheet" type="text/css">





    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/helpinghands.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>





</head>

<body>
    <!-- pre loader div -->
    <div class="se-pre-con"></div>
    <!-- pre loader div ends -->


    <!-- Navigation -->




    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: black;align-content: center !important; font-weight: 700 !important;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="../index.html" style="align-content: center; font-weight: 700 !important;">Helping Hands</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item" style="align-content: center; font-weight: 700;">
                        <a class="nav-link js-scroll-trigger" href="../d3maps.html">know more</a>
                    </li>
                    <li class="nav-item" style="align-content: center; font-weight: 700;">
                        <a class="nav-link js-scroll-trigger" href="index.php">Find Childcare</a>
                    </li>

                    <li class="nav-item" style="align-content: center; font-weight: 700;">
                        <a class="nav-link js-scroll-trigger" href="../contact.html">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Navigation ends -->




    <br><br><br>
    <div id="map" class="shadow" style="float:right;  width: 75%;  height:90%;  background-color:silver; padding: 10px; margin-right: 1%; margin-bottom: 1%; align-content: center"></div>
    <div id="legend">
        <h3>Legend</h3>
    </div>



    <div id="sidebar" class="shadow" style="float:left; align-content: center; width:22%;  height:90%; margin-left: 1%;padding: 10px; margin-bottom: 1%; background-color:#fff2cc;color: white">


        <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Select a Suburb</label>


        <input id="pac-input" style="margin-top: 0px" class="controls" type="text" placeholder="Search ">



        <label for="" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px ">Search along your way</label>

        <input id="origin-input" class="controls" type="text" placeholder="Choose starting point" style="margin-top: 0px">
        <input id="destination-input" class="controls" type="text" placeholder="Choose destination">
        <div id="mode-selector" class="controls" style="background-color: white;color: black;max-width: 90%">
            <input type="radio" style="background-color: white" name="type" id="changemode-walking">
            <label for="changemode-walking" style="font-size: 10px">Walking</label>
            <input type="radio" name="type" id="changemode-transit">
            <label for="changemode-transit" style="font-size: 10px">PTV</label>

            <input type="radio" name="type" id="changemode-driving" checked="checked">
            <label for="changemode-driving" style="font-size: 10px">Driving</label>
        </div>


        <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Select Childcare type</label>

        <select id="type" class="controls" style="margin-top: 0px" onchange="markerCategory = this.value; filterMarkers(this.value, postcodeInfo, qualityStandard, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Centre">Centre Based Care</option>
            <option value="Family">Family Day Care</option>
            </select>


        <label for="rating" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px ">Select Childcare rating</label>

        <select id="rating" class="controls" style="margin-top: 0px" onchange="reset = false;  qualityStandard = this.value; filterMarkers(markerCategory, postcodeInfo, this.value, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Exceeding">Exceeding NQS</option>
            <option value="Meeting">Meeting NQS</option>
            <option value="Not">Not Meeting NQS</option>
        </select>
        <label for="type" style="align-content: space-around;font-size: 10px;font-family: sans-serif;color: dimgray;padding-left: 10px;">NQS: National Quality Standard</label>
        

    </div>



    <br><br>



    <!--application script -->
    <script>
        var dataNew = <?php echo json_encode($return);?>;
        
        var locations = dataNew.data;
        
        // Declare Global Variable this is also used to handle filering
        var markerCategory = "";
        var reset = false;
        var qualityStandard = "";
        var postcodeInfo = "";
        var markerCluster;
        var map, infoWindow;
        var markers = [];
        var myLocation = {
            lat: -37.81,
            lng: 144.96
        };
        var mainCenter = {
            lat: -37.81,
            lng: 144.96
        };
        // Declare meeting standard to show in the infowindow:
        var qualityDef = {
            "NA": "No Information",
            "Exceeding": "Exceeding National Quality Standard",
            "Not": "Not meeting National Quality Standard",
            "Meeting": "Meeting National Quality Standard"
        };

        var myPostCode = "3000";
        var myAddress = "Melbourne VIC 3000, Australia";
        // Initialize Map
        var initMap = function() {
            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(MapStyle, {
                name: 'Styled Map'
            });
            /*
            // Strict boundaries
            var strictBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(-37.950911, 144.596250),
                new google.maps.LatLng(-37.663928, 145.355336)
            );
            */

            // Create a map object and specify the DOM element for display.
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -37.81,
                    lng: 144.96
                },
                zoom: 12,
                //gestureHandling: 'cooperative',

                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
                }

            });
            // Set a style for the Map using the style.js
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
            /*
            // Listen for the dragend event
            google.maps.event.addListener(map, 'dragend', function() {
                if (strictBounds.contains(map.getCenter())) return;

                // We're out of bounds - Move the map back within the bounds
                var c = map.getCenter(),
                    x = c.lng(),
                    y = c.lat(),
                    maxX = strictBounds.getNorthEast().lng(),
                    maxY = strictBounds.getNorthEast().lat(),
                    minX = strictBounds.getSouthWest().lng(),
                    minY = strictBounds.getSouthWest().lat();

                if (x < minX) x = minX;
                if (x > maxX) x = maxX;
                if (y < minY) y = minY;
                if (y > maxY) y = maxY;

                map.setCenter(new google.maps.LatLng(y, x));

            });
            */

            // Infowindow for location setting
            infoWindow = new google.maps.InfoWindow;

            // Infowindow for Marker
            var infowindowM = new google.maps.InfoWindow();

            // Customize Marker:
            var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            var icons = {
                Centre: {
                    name: 'Centre',
                    url: 'rsz_center05x.png',
                    scaledSize: new google.maps.Size(50, 50), // scaled size
                },
                Family: {
                    name: 'Family',
                    url: 'rsz_carer05x.png',
                    scaledSize: new google.maps.Size(50, 50), // scaled size
                }

            }
            // Define Legend
            var legend = document.getElementById('legend');
            // Add element to legend
            for (var key in icons) {
                var type = icons[key];
                var name = type.name;
                var icon = type.url;
                var div = document.createElement('div');
                div.innerHTML = '<img src="' + icon + '"> ' + name + " based Care";
                legend.appendChild(div);
            }
            // Push Legend to proper place on the map
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
            // Declaring variable for the marker
            var marker, i;
            // Adding markers with information:
            markers = locations.map(function(location, i) {
                var marker = new google.maps.Marker({
                    position: location,
                    icon: icons[location.ServiceType],
                    category: location.ServiceType,
                    postcode: location.Postcode,
                    rating: location.OverallRating,
                });
                // Add Marker Info using InfoWindow
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var locationQuality = qualityDef[String(location.OverallRating)];
                        // Phone information
                        var locationPhone = String(location.Phone);
                        if (locationPhone.length === 0) {
                            locationPhone = "No Information";

                        }
                        // Fax Information
                        var locationFax = String(location.Fax);
                        if (locationFax.length === 0) {
                            locationFax = "No Information";
                        }
                        infowindowM.setContent('<div>' +
                            '<strong>' + location.ServiceName + '</strong><br>' +
                            '<strong>Provider: </strong>' + location.ProviderLegalName + '<br>' +
                            '<strong>Address: </strong>' + location.ServiceAddress + '<br>' +
                            '<strong>Suburb: </strong>' + location.Suburb + '<br>' +
                            '<strong>State: </strong>' + location.state + '<br>' +
                            '<strong>Phone: </strong>' + locationPhone + '<br>' +
                            '<strong>Fax: </strong>' + locationFax + '<br>' +
                            '<strong>Email: </strong>' + location['Email Address'] + '<br>' +
                            '<strong>Occupancy: </strong>' + location.NumberOfApprovedPlaces + '<br>' +
                            '<strong>Overall Rating: </strong>' + locationQuality + '<br>' +
                            '</div>');
                        infowindowM.open(map, marker);
                        map.panTo(this.getPosition());
                        map.setZoom(16);
                    }
                })(marker, i));
                return marker;
            });
            // Add Marker Cluster
            markerCluster = new MarkerClusterer(map, markers, {
                maxZoom: 14,
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });
            // Reverse GeoCoder:
            var geocoder = new google.maps.Geocoder();

            // Try HTML5 geolocation to locate yourself.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    myLocation = pos;
                    var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    // Get the Location of the current location based on postcode
                    geocoder.geocode({
                        'latLng': point
                    }, function(results, status) {
                        if (status === 'OK') {
                            // If results actually exist
                            if (results[0]) {
                                // Searching for Postal Code in the address components since normally this one is volatile
                                for (var i = 0; i < results[0].address_components.length; i++) {
                                    for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                        if (results[0].address_components[i].types[j] == "postal_code") {
                                            // Get the current Postcode from the Search Box
                                            myPostCode = results[0].address_components[i].long_name;
                                            // Filter the suburb using this information
                                            // Check this one again, maybe change it with the filtermarkers
                                            //filterSuburbs(myPostCode);
                                        }
                                    }
                                }
                                // Get the formatted address:
                                myAddress = results[0].formatted_address;
                                // InfoWindow to Print out the Result - Maybe need to add a Unique Marker here:
                                infoWindow.setPosition(myLocation);
                                infoWindow.setContent('You are here: ' + myAddress);
                                infoWindow.open(map);
                                // Set back the center:
                                map.setCenter(myLocation);
                                map.setZoom(16);

                                // Naive way of returning the address:
                                //return results[0].address_components[results[0].address_components.length - 1].long_name;
                            } else {
                                window.alert('No results found');
                                return "3000";
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                            return "3000";
                        }
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }


            // Create the DIV to hold the control and call the CenterControl()
            // constructor passing in this DIV.
            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map);
            // Reset button on the Map
            centerControlDiv.index = 1;
            centerControlDiv.style['padding-top'] = '10px';
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(centerControlDiv);
            /*
            // Go back to Homepage 
            var homePageDiv = document.createElement('div');
            var homePage = new HomePageControl(homePageDiv, map);
            // Homepage Button on the Map
            homePageDiv.index = 1;
            homePageDiv.style['padding-left'] = '10px';
            homePageDiv.style['padding-top'] = '10px';
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(homePageDiv);
            */
            // Locate Yourself
            var locateSelfDiv = document.createElement('div');
            var locateSelf = new LocateControl(locateSelfDiv, map);
            // Locate Button Position on the Map
            locateSelfDiv.index = 1;
            locateSelfDiv.style['padding-left'] = '10px';
            locateSelfDiv.style['padding-top'] = '10px';
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locateSelfDiv);

            // Create a new searching using autocomplete
            new AutocompleteDirectionsHandler(map, markers);

            // Filtering Position
            var filterOptions = document.getElementById('type');
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(filterOptions);

            // Dropdown Position
            var qualityOptions = document.getElementById('rating');
            qualityOptions.style['padding-left'] = '10px';
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(qualityOptions);

            // Create the search box and link it to the UI element.
            // Creating options to limits the search restriction for search box
            var input = document.getElementById('pac-input');
            var options = {
                types: ['(regions)'],
                componentRestrictions: {
                    country: 'au'
                }
            };
            // Using Autocomplete instead of searchbox to make sure the restriction is applied
            var searchBox = new google.maps.places.Autocomplete(input, options);
            // Push the search box to a appropriate position on the Map
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            // Add listener for the place that is changed in the search Box field
            searchBox.addListener('place_changed', function() {
                var place = searchBox.getPlace();
                if (place.length == 0) {
                    return;
                }
                // Get the Boundaries for search box
                var bounds = new google.maps.LatLngBounds();
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                // Searching for Postal Code Component in the address component (sometimes address component is different from each other)
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            // Get the current Postcode from the Search Box
                            postcodeInfo = place.address_components[i].long_name;
                            // Filter the suburb using this information
                            filterSuburbs(postcodeInfo);
                        }
                    }
                }
                map.fitBounds(bounds);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrqCrX_hFC0BN8Vue3uINhAHzPTASkWBQ&callback=initMap&libraries=places" defer></script>



</body>

</html>