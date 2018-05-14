function CenterControl(controlDiv, map) {

    // Set CSS for the control border.
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.textAlign = 'center';
    controlUI.style.float = 'left';
    controlUI.title = 'Click to reset the filed values on the map';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    var controlText = document.createElement('div');
    controlText.style.color = 'rgb(25,25,25)';
    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlText.style.fontSize = '15px';
    controlText.style.lineHeight = '25px';
    controlText.style.paddingLeft = '5px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = 'Reset Map';
    controlUI.appendChild(controlText);

    // Setup the click event listeners: simply set the map to Main Center.
    controlUI.addEventListener('click', function() {
        map.setCenter(myLocation);
        map.setZoom(16);
        reset = true;
        markerCategory = "";
        qualityStandard = "";
        postcodeInfo = "";

        if (infoWindow) {
            if (infoWindow.getMap()) {
                infoWindow.setMap(null);
            }
        }

        if (infoWindowM) {
            if (infoWindowM.getMap()) {
                infoWindowM.setMap(null);
            }
        }

        if (directionsDisplay) {
            if (directionsDisplay.getMap()) {
                directionsDisplay.setMap(null);
            }
        }

        if (directionsDisplayRe) {
            if (directionsDisplayRe.getMap()) {
                directionsDisplayRe.setMap(null);
            }
        }

        // Get the elements:
        var elements = document.getElementsByTagName("input");
        // Clear the input
        for (var ii = 0; ii < elements.length; ii++) {
            if (elements[ii].type == "text") {
                elements[ii].value = "";
            }
        }
        document.getElementById("changemode-transit").checked = true;
        document.getElementById("changemode-driving").checked = false;

        autocomplete.destinationPlaceId = null;
        autocomplete.originPlaceId = null;
        autocomplete.travelMode = "TRANSIT";
        resetListing();
        $('select').prop('selectedIndex', 0);
        //console.log(autocomplete)
        filterMarkers(markerCategory, postcodeInfo, qualityStandard, markerCluster, reset);
    });


}
function resetListing(){
    if (document.getElementById("list")){
        //document.getElementById("list").style.display = "none"; 
        document.getElementById("list").innerHTML = "";

    }
}