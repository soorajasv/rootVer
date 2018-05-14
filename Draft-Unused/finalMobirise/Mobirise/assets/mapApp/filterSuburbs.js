function filterSuburbs(suburbs) {
    clusMarkers = [];
    markerCategory = "";
    markerCluster.clearMarkers();
    reset = false;
    for (i = 0; i < markers.length; i++) {
        marker = markers[i];
        // If is same category or category not picked
        if (marker.postcode == suburbs || suburbs.length === 0) {
            marker.setVisible(true);
            clusMarkers.push(marker);
        }
        // Categories don't match 
        else {
            marker.setVisible(false);
        }
    }
    //console.log(clusMarkers);
    markerCluster.addMarkers(clusMarkers);

}