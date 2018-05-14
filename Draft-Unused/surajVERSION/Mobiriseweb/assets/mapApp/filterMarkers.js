function filterMarkers(category, postcodeInfo, qualityStandard, markerCluster, reset) {
    var clusMarkers = [];
    markerCluster.clearMarkers();
    
    for (i = 0; i < markers.length; i++) {
        marker = markers[i];
        
        // If is same category or category not picked
        if (marker.category == category || category.length === 0) {
            if(reset){
                marker.setVisible(true);
                clusMarkers.push(marker);
            }
            else {
                if(marker.rating == qualityStandard || qualityStandard.length === 0){
                    if (marker.postcode == postcodeInfo || postcodeInfo.length === 0){
                        marker.setVisible(true);
                        clusMarkers.push(marker);
                    }
                    else {
                        marker.setVisible(false);    
                    }                    
                } else {
                    marker.setVisible(false);
                }

            }
        }
        // Categories don't match 
        else {
            marker.setVisible(false);
        }
    }
    markerCluster.addMarkers(clusMarkers);
    reset = false;

}