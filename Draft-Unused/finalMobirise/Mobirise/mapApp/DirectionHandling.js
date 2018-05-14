/**
 * @constructor
 */
var noBreak;
var currentLatLng;
var travelMode;
function AutocompleteDirectionsHandler(map) {

    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = 'TRANSIT';
    var originInput = document.getElementById('origin-input');
    var destinationInput = document.getElementById('destination-input');
    var modeSelector = document.getElementById('mode-selector');
    this.directionsService = new google.maps.DirectionsService;
    this.directionsDisplay = new google.maps.DirectionsRenderer;
    this.directionsDisplay.setMap(map);

    var originAutocomplete = new google.maps.places.Autocomplete(
        originInput, {
            placeIdOnly: true
        });
    var destinationAutocomplete = new google.maps.places.Autocomplete(
        destinationInput, {
            placeIdOnly: true
        });

    //this.setupClickListener('changemode-walking', 'WALKING');
    this.setupClickListener('changemode-transit', 'TRANSIT');
    this.setupClickListener('changemode-driving', 'DRIVING');

    this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
    this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

    //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
    //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
    //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
    var radioButton = document.getElementById(id);
    var me = this;
    radioButton.addEventListener('click', function() {
        me.travelMode = mode;
        me.route();
    });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
    var me = this;
    autocomplete.bindTo('bounds', this.map);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
        }
        if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
        } else {
            me.destinationPlaceId = place.place_id;
        }
        me.route();
    });

};

AutocompleteDirectionsHandler.prototype.route = function() {
    if (!this.originPlaceId || !this.destinationPlaceId) {
        return;
    }
    if (this.originPlaceId === this.destinationPlaceId) {
        window.alert("Choose different locations for start and finish");
        return;
    }
    var me = this;

    this.directionsService.route({
        
        origin: {
            'placeId': this.originPlaceId
        },
        destination: {
            'placeId': this.destinationPlaceId
        },
        travelMode: this.travelMode
    }, function(response, status) {
        if (status === 'OK') {
            if (directionsDisplayRe){
                if (directionsDisplayRe.getMap()) {
                directionsDisplayRe.setMap(null);
            }
            }
            directionsDisplay = me.directionsDisplay;
            directionsDisplay.setMap(map);
            var distanceTaken = response.routes['0'].legs[0].distance.text;
            var timeTaken = response.routes['0'].legs[0].duration.text;
            var modeTaken = response.request.travelMode;
            var startAddress = response.routes['0'].legs[0].start_address;
            var endAddress = response.routes['0'].legs[0].end_address;
            var routeArray = response.routes['0'].legs[0].steps;
            var routeLength = routeArray.length;
            posSubArray = [];
            encodedPostcode = [];
            delay = 100;
            nextAddress = 0;
            //console.log(routeArray);
            var travelLength = 0;
            // Need to check only for driving
            for (i = 0; i < routeLength; i++) {
                if (i === 0) {
                    currentLatLng = {
                        lat: routeArray[i].start_location.lat(),
                        lng: routeArray[i].start_location.lng()
                    }
                    posSubArray.push(currentLatLng);
                    travelLength = travelLength + routeArray[i].distanceValue;
                } else {
                    travelLength = travelLength + routeArray[i].distanceValue;
                    if (i === routeLength - 1) {
                        if (routeArray[i].distance.value > 3000 && modeTaken === 'DRIVING') {
                            noBreak = 1;
                            breakRoute(routeArray[i].distance.value, noBreak, routeArray[i].path);
                            travelLength = 0;
                        }
                        currentLatLng = {
                            lat: routeArray[i].start_location.lat(),
                            lng: routeArray[i].start_location.lng()
                        }
                        posSubArray.push(currentLatLng);
                        currentLatLng = {
                            lat: routeArray[i].end_location.lat(),
                            lng: routeArray[i].end_location.lng()
                        }
                        posSubArray.push(currentLatLng);

                        posSubArray = posSubArray.filter(onlyUnique);
                        // Randomizing element
                        var startPoint = posSubArray[0];
                        var endPoint = posSubArray[posSubArray.length - 1];
                        if (posSubArray.length > 10) {
                            posSubArray = posSubArray.slice(1, posSubArray.length);
                            posSubArray = distributedCopy(posSubArray, 8);
                            posSubArray.push(startPoint);
                            posSubArray.push(endPoint);
                        }

                        theNext();
                    } else {
                        if (modeTaken === 'DRIVING') {
                            if (travelLength > 3000) {
                                if (routeArray[i].distance.value > 3000 && modeTaken === 'DRIVING') {
                                    noBreak = 1;
                                    breakRoute(routeArray[i].distance.value, noBreak, routeArray[i].path);
                                    travelLength = 0;
                                } else {
                                    currentLatLng = {
                                        lat: routeArray[i].start_location.lat(),
                                        lng: routeArray[i].start_location.lng()
                                    }
                                    posSubArray.push(currentLatLng);
                                    travelLength = 0;

                                }

                            } else {
                                if (routeArray[i].distance.value > 3000 && modeTaken === 'DRIVING') {
                                    noBreak = 1;
                                    breakRoute(routeArray[i].distance.value, noBreak, routeArray[i].path);
                                    travelLength = 0;
                                }
                            }
                        } else {
                            currentLatLng = {
                                lat: routeArray[i].start_location.lat(),
                                lng: routeArray[i].start_location.lng()
                            }
                            posSubArray.push(currentLatLng);
                            travelLength = 0;
                        }

                    }
                }

            }
            if (infoWindow) {
                infoWindow.setMap(map);
                infoWindow.setPosition(posSubArray[0]);
                infoWindow.setContent('<div>' +
                    '<strong>Time Taken: </strong>' + timeTaken + '<br>' +
                    '<strong>Distance: </strong>' + distanceTaken + '<br>' +
                    '<strong>Travel Mode: </strong>' + modeTaken + '<br>' +
                    '</div>');

            }
            me.directionsDisplay.setDirections(response);

        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });



};

function breakRoute(distanceValue, noBreak, distancePath) {
    if (distanceValue > 3000) {
        noBreak = noBreak * 2;
        breakRoute(distanceValue / 2, noBreak, distancePath);

    } else {
        if (noBreak > 1) {
            var pathArray = distributedCopy(distancePath, noBreak);
            for (j = 0; j < pathArray.length; j++) {
                currentLatLng = {
                    lat: pathArray[j].lat(),
                    lng: pathArray[j].lng()
                }
                posSubArray.push(currentLatLng);
            }
        }
    }
};

function distributedCopy(items, n) {
    var elements = [items[0]];
    var totalItems = items.length - 2;
    var interval = Math.floor(totalItems / (n - 2));
    for (var i = 1; i < n - 1; i++) {
        elements.push(items[i * interval]);
    }
    elements.push(items[items.length - 1]);
    return elements;
}

function getRandom(arr, n) {
    var result = new Array(n),
        len = arr.length,
        taken = new Array(len);
    if (n > len)
        throw new RangeError("getRandom: more elements taken than available");
    while (n--) {
        var x = Math.floor(Math.random() * len);
        result[n] = arr[x in taken ? taken[x] : x];
        taken[x] = --len in taken ? taken[len] : len;
    }
    return result;
}