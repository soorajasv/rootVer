 <script>
    	var abc = " cba";
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
        var initMap = function(locations) {
            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(MapStyle, {
                name: 'Styled Map'
            });
            // Strict boundaries
            var strictBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(-37.950911, 144.596250),
                new google.maps.LatLng(-37.663928, 145.355336)
            );

            // Create a map object and specify the DOM element for display.
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -37.81,
                    lng: 144.96
                },
                zoom: 12,
                gestureHandling: 'cooperative',

                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
                }

            });
            // Set a style for the Map using the style.js
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');

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
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(legend);
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
                        infowindowM.setContent('<div>' +
                            '<strong>' + location.ServiceName + '</strong><br>' +
                            '<strong>Provider: </strong>' + location.ProviderLegalName + '<br>' +
                            '<strong>Address: </strong>' + location.ServiceAddress + '<br>' +
                            '<strong>Suburb: </strong>' + location.Suburb + '<br>' +
                            '<strong>Phone: </strong>' + location.Phone + '<br>' +
                            '<strong>Fax: </strong>' + location.Fax + '<br>' +
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

            // Go back to Homepage 
            var homePageDiv = document.createElement('div');
            var homePage = new HomePageControl(homePageDiv, map);
            // Homepage Button on the Map
            homePageDiv.index = 1;
            homePageDiv.style['padding-left'] = '10px';
            homePageDiv.style['padding-top'] = '10px';
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(homePageDiv);

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
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(filterOptions);

            // Dropdown Position
            var qualityOptions = document.getElementById('rating');
            qualityOptions.style['padding-left'] = '10px';
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(qualityOptions);

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
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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

        // Call Back function to read the parse Data:
        function parseData() {
            Papa.parse("EducationInfo.csv", {
                header: true,
                download: true,
                dynamicTyping: true,
                complete: function(results) {
                    initMap(results.data);
                }
            });
        }
    </script>
