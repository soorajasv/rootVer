var directionsServiceRe;
var directionsDisplayRe;
// var travelModeRe;
// var destinationPlaceIdRe;
// var originPlaceIdRe;

var calculateAndDisplayRoute = function(currentMarker) {
    if (!autocomplete.originPlaceId || !autocomplete.destinationPlaceId) {
        window.alert("You have to choose the route you want to search for first!");
        return;
    } else {
        if (autocomplete.travelMode === "TRANSIT") {
            window.alert("This function only work for Driving mode!");
            return;
        } else {
            var waypts = [];
            waypts.push({
                location: currentMarker.position,
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
                    
                    if (directionsDisplay) {
                        if (directionsDisplay.getMap()) {
                            directionsDisplay.setMap(null);
                        }
                    }
                    var distanceTaken = response.routes['0'].legs[0].distance.value + response.routes['0'].legs[1].distance.value;
                    var timeTaken = response.routes['0'].legs[0].duration.value + response.routes['0'].legs[1].duration.value;

                    var modeTaken = response.request.travelMode;
                    if (infoWindow) {
                        infoWindow.setMap(map);
                        infoWindow.setPosition(currentMarker.position);
                        infoWindow.setContent('<div>' +
                            '<strong>Time Taken: </strong>' + secondsToHms(timeTaken) + '<br>' +
                            '<strong>Distance: </strong>' + Math.round(distanceTaken/1000) + ' km<br>' +
                            '<strong>Travel Mode: </strong>' + modeTaken + '<br>' +
                            '</div>');

                    }
                    directionsDisplayRe.setMap(map);
                    directionsDisplayRe.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }

    }

}


function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
    return hDisplay + mDisplay + sDisplay; 
}