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
            controlUI.title = 'Click to center the map to CBD';
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
                map.setCenter(mainCenter);
                map.setZoom(16);
                reset = true;
                markerCategory = "";
                qualityStandard = "";
                postcodeInfo = "";

                if (infoWindow) {
                    if (infoWindow.getMap()) {
                        infoWindow.setMap(null);
                    }
                    /* 
                    else {
                        infoWindow.setMap(map);
                    }
                    */
                }

                if (infoWindowM) {
                    if (infoWindowM.getMap()) {
                        infoWindowM.setMap(null);
                    }
                    /* 
                    else {
                        infoWindowM.setMap(map);
                    }
                    */
                }

                if (directionsDisplay) {
                    if (directionsDisplay.getMap()) {
                        directionsDisplay.setMap(null);
                    }
                    /* 
                    else {
                        directionsDisplay.setMap(map);
                    }
                    */
                }
                var elements = document.getElementsByTagName("input");
                for (var ii = 0; ii < elements.length; ii++) {
                    if (elements[ii].type == "text") {
                        elements[ii].value = "";
                    }
                }
                //document.getElementById('origin-input').value = '';
                //document.getElementById('destination-input').value = '';
                /*
                document.getElementById('origin-input').blur();
                setTimeout(function() {
                    document.getElementById('origin-input').val('')
                    document.getElementById('origin-input').focus();
                }, 10);
                document.getElementById('destination-input').blur();
                setTimeout(function() {
                    document.getElementById('destination-input').val('')
                    document.getElementById('destination-input').focus();
                }, 10);
                */
                // This one is for fill the data into the searchbox
                //document.getElementById('origin-input').value = myAddress;
                //autocomplete = new AutocompleteDirectionsHandler(map, markers);
                //$("input").val('');
                /*
                var inputs = document.querySelectorAll("input[type=radio]:checked"),
                x = inputs.length;
                
                while (x--) inputs[x].checked = 0;
                */
                resetListing();
                $('select').prop('selectedIndex', 0);

                filterMarkers(markerCategory, postcodeInfo, qualityStandard, markerCluster, reset);
            });


        }
        function resetListing(){
            if (document.getElementById("list")){
                //document.getElementById("list").style.display = "none"; 
                document.getElementById("list").innerHTML = "";

            }
        }