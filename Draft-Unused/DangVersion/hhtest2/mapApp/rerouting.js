var directionsServiceRe;
var directionsDisplayRe;
// var travelModeRe;
// var destinationPlaceIdRe;
// var originPlaceIdRe;

function calculateAndDisplayRoute(currentMarker) {
    if (!autocomplete.originPlaceId || !autocomplete.destinationPlaceId) {
        window.alert("You have to choose the route you want to search for first!");
        return;
    } else {
        if (autocomplete.travelMode === "TRANSIT") {
            window.alert("This function only work for Driving mode!");
            return;
        } else {
            console.log(currentMarker);
            console.log(currentMarker.address);
            console.log(document.getElementById('origin-input').value);
            var waypts = [];
            waypts.push({
                location: currentMarker.address,
                stopover: true
            });
            directionsServiceRe.route({
                origin: document.getElementById('origin-input').value,
                destination: document.getElementById('destination-input').value,
                waypoints: waypts,
                optimizeWaypoints: true,
                travelMode: autocomplete.travelMode
            }, function(response, status) {
                if (status === 'OK') {
                    console.log(response);
                    if (directionsDisplay) {
                        if (directionsDisplay.getMap()) {
                            directionsDisplay.setMap(null);
                        }
                    }
                    var distanceTaken = response.routes['0'].legs[0].distance.text;
                    var timeTaken = response.routes['0'].legs[0].duration.text;
                    var modeTaken = response.request.travelMode;
                    if (infoWindow) {
                        infoWindow.setMap(map);
                        infoWindow.setPosition(currentMarker.position);
                        infoWindow.setContent('<div>' +
                            '<strong>Time Taken: </strong>' + timeTaken + '<br>' +
                            '<strong>Distance: </strong>' + distanceTaken + '<br>' +
                            '<strong>Travel Mode: </strong>' + modeTaken + '<br>' +
                            '</div>');

                    }
                    directionsDisplayRe.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

    }

}