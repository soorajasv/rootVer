function filterMarkers(category, postcodeInfo, qualityStandard, markerCluster, reset) {
    clusMarkers = [];
    markerCluster.clearMarkers();
    var correctList = [];

    for (i = 0; i < markers.length; i++) {
        marker = markers[i];
        var flag = false;

        // If is same category or category not picked
        if (marker.category == category || category.length === 0) {
            if (reset) {
                marker.setVisible(true);
                clusMarkers.push(marker);
            } else {
                if (marker.rating == qualityStandard || qualityStandard.length === 0) {
                    if (postcodeInfo.constructor === Array) {
                        //console.log(postcodeInfo);
                        //console.log("Is an array");
                        for (j = 0; j < postcodeInfo.length; j++) {
                            if (marker.postcode == postcodeInfo[j]) {
                                flag = true;
                                marker.setVisible(true);
                                clusMarkers.push(marker);
                            } else {
                                if (flag === false) {
                                    marker.setVisible(false);
                                }
                            }
                        }

                    } else {
                        //console.log(postcodeInfo)
                        //console.log("Is not an array");
                        if (marker.postcode == postcodeInfo || postcodeInfo.length === 0) {
                            marker.setVisible(true);
                            clusMarkers.push(marker);
                        } else {
                            marker.setVisible(false);
                        }
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

    //if (postcodeInfo.constructor === Array) {
    if (reset || postcodeInfo.length === 0) {

    } else {
        writeList();
    }


    //}
    //console.log(clusMarkers);
    markerCluster.addMarkers(clusMarkers);
    reset = false;

}

