/**
 * @constructor
 */
var noBreak;
var currentLatLng;

function AutocompleteDirectionsHandler(map) {

    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = 'DRIVING';
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

    this.setupClickListener('changemode-walking', 'WALKING');
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
            // Need to check only for driving
            for (i = 0; i < routeLength; i++) {
                if (routeArray[i].distance.value > 2000 && modeTaken === 'DRIVING') {
                    noBreak = 1;
                    //console.log(routeArray[i].path);
                    breakRoute(routeArray[i].distance.value, noBreak, routeArray[i].path);
                    //console.log(routeArray[i]);
                    
                }
                currentLatLng = {
                    lat: routeArray[i].start_location.lat(),
                    lng: routeArray[i].start_location.lng()
                }
                posSubArray.push(currentLatLng);
                if (i === routeLength - 1) {
                    currentLatLng = {
                        lat: routeArray[i].end_location.lat(),
                        lng: routeArray[i].end_location.lng()
                    }
                    posSubArray.push(currentLatLng);
                    posSubArray = posSubArray.filter(onlyUnique);
                    theNext();
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
    if (distanceValue > 2000) {
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