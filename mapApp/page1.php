<!DOCTYPE html>

<script type="text/javascript">
    if (screen.width <= 699) {
        document.location = "https://helpinghandsmelbourne.azurewebsites.net/mapApp/page2.php";
    }
</script>




<?php 
    header("Content-type: text/html; charset=utf-8；");
    include  "getData.php";
?>





<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.7.2, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.7.2, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="../../assets/images/logo-122x67.png" type="image/x-icon">
    <meta name="description" content="Web Site Builder Description">
    <title>Find a Childcare</title>
    <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="../assets/tether/tether.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/socicon/css/styles.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">


    <!-- files for google map application -->
    <script src="https://cdn.klokantech.com/maptilerlayer/v1/index.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

    <script src="MapStyle.js" type="text/javascript"></script>
    <script src="CenterControl.js" type="text/javascript"></script>
    <script src="HomePageControl.js" type="text/javascript"></script>
    <script src="handleLocationError.js" type="text/javascript"></script>
    <script src="filterMarkers.js" type="text/javascript"></script>
    <script src="filterSuburbs.js" type="text/javascript"></script>
    <script src="DirectionHandling.js" type="text/javascript"></script>
    <script src="LocateControl.js" type="text/javascript"></script>
    <script src="rerouting.js" type="text/javascript"></script>



    <link href="application.css" rel="stylesheet" type="text/css">


    <!-- Side bar sytle -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>


    <!-- Suraj Code -->
    <script>
        $(document).ready(function() {

            $('input#childcare').typeahead({
                name: 'childcare',
                remote: 'searchlist.php?query=%QUERY',

            });
        })
    </script>



    <style>
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../img/loader3.gif) center no-repeat #fff;
        }

        .shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }



        .listdiv hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #ccc;
            margin: 1em 0;
            padding: 0;

        }


        .city {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 30px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            width: 80%;
        }



        .tt-query {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 10px 0 13px;
            text-overflow: ellipsis;
            width: 100%;
        }


        .tt-hint {
            visibility: hidden;
            display: disabled;
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 170px;
        }

        #childcare {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 170px;
        }

        .tt-dropdown-menu {
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;

            color: #111;
            background-color: #F1F1F1;

            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 10px 0 13px;
            width: 170px;

        }

        .listdiv {
            height: 92%;
            width: 18%;

            text-align: center;
            float: left;
            right: 20px;
            top: 60px;

            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);

            overflow: scroll;
        }

        .showbutton {
            position: fixed;
            float: right;
            right: 20px;
            top: 60px;
        }

        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .listButton1 {
            background-color: #008CBA;
            color: white;
            width: 80%;
            cursor: pointer;
        }

        .listButton2 {
            background-color: #f44336;
            color: white;
            width: 80%;
            cursor: pointer;
        }

        .listButton3 {
            background-color: #4CAF50;
            color: white;
            width: 80%;
            cursor: pointer;
        }

        .listTitle {
            color: #008CBA;
            cursor: pointer;
        }
    </style>





</head>

<body>
    <section class="menu cid-qR3Qg6BoIv" once="menu" id="menu1-h">



        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                    <a href="https://helpinghandsmelbourne.azurewebsites.net/index.html">
                         <img src="../../assets/images/logo-122x67.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="../index.html">Helping Hands</a></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-white display-4" href="../page3.html#slider1-s" data-toggle="dropdown-submenu" aria-expanded="true">
                        Did you know</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-white display-4" href="../page3.html#content4-1g" aria-expanded="false">Infographics</a>
                            <a class="dropdown-item text-white display-4" href="../page3.html#timeline2-t">How can I enroll my kid into a child care<br></a>
                            <a class="dropdown-item text-white display-4" href="../page4.html#info2-z">Average fee for suburbs in VIC<br></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/mapApp/page1.php">
                            <font face="MobiriseIcons"><span style="font-size: 25.6px;">&nbsp; &nbsp; &nbsp;</span></font> Find a child care &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="/page2.html">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; About Us &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="/mapApp/page1.php"></a></li>
                </ul>

            </div>
        </nav>
    </section>



    <!-- map code -->





    <section style="height : 100%; padding-top: 8%;">



        <div id="sidebar" style="align-content: center; float: left; width :20%;  height:92%; margin-left: 1%;padding: 10px; margin-bottom: 1%; background-color: #edece4; background-image: url('https://www.transparenttextures.com/patterns/blizzard.png');color: white; border: 1px solid #ccc; border: 1px solid rgba(0, 0, 0, 0.2);">

            <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Search for childcare</label>
            <br>
            <input name="city" id="childcare" style="margin-top: 0px;" class="controls" type="text" placeholder="Childcare name ">


            <button id="go" style="float:right; cursor:pointer;" title="Find the Childcare centre" onclick="resetName = true; resetListing(); getName();"></button>

            <br>
            <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Search by suburb</label>
            <input id="pac-input" style="margin-top: 0px" class="controls" type="text" placeholder="Enter Postcode or Suburb name">
            <button id="suburbPlace" style="float:right; cursor:pointer;" title="Check for your current suburb" onclick="goToMyLocation(map, myPostCode, true);"></button>

            <label for="" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px ">Search along way</label>

            <input id="origin-input" class="controls" type="text" placeholder="Enter starting point" style="margin-top: 0px">
            <button id="originPlace" style="float:right; cursor:pointer;" title="Fill your current location" onclick="document.getElementById('origin-input').value = myAddress; autocomplete.originPlaceId = myAddressID;"></button>

            <input id="destination-input" class="controls" type="text" placeholder="Enter your destination">


            <div id="mode-selector" class="controls" style="background-color: white;color: black; max-width: 70%,">
                <input type="radio" name="type" id="changemode-transit" checked="checked">
                <label for="changemode-transit" style="font-size: 16px">PTV</label>

                <input type="radio" name="type" id="changemode-driving">
                <label for="changemode-driving" style="font-size: 16px">Driving</label>
            </div>


            <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Select Childcare type</label>

            <select id="type" class="controls" style="margin-top: 0px" onchange="markerCategory = this.value; filterMarkers(this.value, postcodeInfo, qualityStandard, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Centre">Centre Based Care</option>
            <option value="Family">Family Day Care</option>
            </select>


            <label for="rating" style="font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;margin-top: 20px ">Select Childcare rating</label>
            <label for="rating" style="font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px; ">NQS - National Quality Standard</label>

            <select id="rating" class="controls" style="margin-top: 0px" onchange="reset = false;  qualityStandard = this.value; filterMarkers(markerCategory, postcodeInfo, this.value, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Exceeding">Exceeding NQS</option>
            <option value="Meeting">Meeting NQS</option>
            <option value="Not">Not Meeting NQS</option>
        </select>


        </div>
        <div id="map" style="  height:92%; float:left; width: 57%; background-color:silver; padding: 10px; margin-right: 1%;  margin-left: 1%; margin-bottom: 1%; align-content: center"></div>
        <div id="list" class="listdiv"></div>





        <div id="legend">

        </div>


        <!--application script -->
        <script>

            //Redirect function

            function redirect(service) {
                //window.location.href = "https://helpinghandsmelbourne.azurewebsites.net/surajVERSION/hhtest2/DataFromDatabase/index.php?pm="+service;
                window.open("https://helpinghandsmelbourne.azurewebsites.net/mapApp/DataFromDatabase/index.php?pm=" + service, '_blank');

            }
            var orgButton = document.getElementById("originPlace");
            orgButton.innerHTML = '<img src="' + "ic.png" + '"> ';
            var subButton = document.getElementById("suburbPlace");
            subButton.innerHTML = '<img src="' + "ic.png" + '"> ';
            var magButton = document.getElementById("go");
            magButton.innerHTML = '<img src="' + "magic.png" + '"> ';
            // Reverse GeoCoder:
            var clusMarkers;
            var dataNew = <?php echo json_encode($return, JSON_NUMERIC_CHECK);?>;
            var locations = dataNew.data;
            var directionsDisplay;
            var autocomplete;
            // Declare Global Variable this is also used to handle filering
            var posSubArray;
            var markerCategory = "";
            var reset = false;
            var qualityStandard = "";
            var postcodeInfo = "";
            var markerCluster;
            var map, infoWindow, infoWindowM;
            var markers = [];
            // Getting the area directional handling:
            var delay = 100;
            var nextAddress = 0;
            var getPostSub;
            var encodedPostcode = [];
            var encodedElement = "3000";
            var geocoder;
            var compareList = [];
            // Global Variable for getName;
            var resetName;
            // compare function

            function compare() {
                var arrayLength = compareList.length;

                if (compareList.length == 0) {
                    alert("You haven't selected any childcare centres");
                    return;
                }

                if (compareList.length == 1) {
                    alert("You have only selected one");
                    return;
                }

                if (compareList.length > 4) {
                    alert("You have already selected 4 childcare centers.You cannot compare beyond 4");
                    return;
                }

                sessionStorage.setItem('services', compareList);
                // window.open("https://helpinghandsmelbourne.azurewebsites.net/surajVERSION/hhtest2/mapApp/compare.html",'_blank');

                window.open("https://helpinghandsmelbourne.azurewebsites.net/mapApp/compare.php?pm=" + compareList, '_blank');


            }

            function clearList() {
                compareList = [];
                sessionStorage.clear();
            }


            //push func to compare list
            function compareListpush(serv) {


                if (compareList.length == 0) {
                    compareList.push(serv);
                    alert("Childcare is added to your compare list!");
                    return;
                }

                if (compareList.length > 3) {
                    alert("You already chosed 4 childcare which is maximum to compare");
                    return;
                }

                var i = 0;
                var flag = 0;
                while (i < compareList.length) {
                    if (serv == compareList[i]) {
                        alert("You already chosed this childcare");
                        flag = 1;
                        return;
                    }
                    i++;
                }

                if (flag == 0) {
                    compareList.push(serv);
                    alert("Childcare is added to your compare list.Please click the Compare button.");
                }


            }
            // Pirntout
            var myAddressID = "ChIJm7IcwrhC1moREDUuRnhWBBw";

            // Reactive to the search
            function getName() {
                var name = (document.getElementById("childcare").value).split(',');
                var childCareCode = String(name[0]);
                var cont = true;
                var i = 0;
                if (resetName) {
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
                }

                while (cont) {
                    if (childCareCode == String(markers[i].serviceCode)) {
                        //console.log(markers[markernow].name);
                        cont = false;
                        google.maps.event.trigger(markers[i], 'click');
                    }
                    i++;

                }
            }

            function getNameReactive(name) {
                var childCareCode = String(name);
                var cont = true;
                var i = 0;

                while (cont) {
                    if (childCareCode == String(markers[i].serviceCode)) {
                        cont = false;
                        google.maps.event.trigger(markers[i], 'click');
                    }
                    i++;

                }
            }
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

            function onlyUnique(value, index, self) {
                return self.indexOf(value) === index;
            }

            var myPostCode = "3000";

            function theNext() {
                if (nextAddress < posSubArray.length) {
                    setTimeout('getPostSub(posSubArray, encodedPostcode, theNext)', delay);
                    nextAddress++;
                } else {
                    // We're done. Show map bounds
                    encodedPostcode = encodedPostcode.filter(onlyUnique);
                    reset = false;
                    //markerCategory = "";
                    //qualityStandard = "";
                    postcodeInfo = encodedPostcode;
                    filterMarkers(markerCategory, postcodeInfo, qualityStandard, markerCluster, reset);

                    if (postcodeInfo.constructor === Array) {
                        writeList();
                    }
                }
            }



            var myAddress = "Melbourne VIC 3000, Australia";

            var writeList = function() {
                var div = document.createElement('div');
                div.id = "list";
                document.getElementById("list").innerHTML = "";
                div.classList.add("listdiv");

                var count = 0;

                if (document.getElementById("list") != null) {
                    compareList = [];
                    document.getElementById('list').innerHTML += '<br>' + "<button type='button' title = 'Click here to compare the child cares that you have choses' class='listButton2' onclick='compare(" + ")' > Compare List </button>";
                    document.getElementById('list').innerHTML += "<button type='button' title = 'Click here to restart the list' class='listButton2' onclick='clearList(" + ")' > Clear List </button>";
                    document.getElementById('list').innerHTML += '<hr></hr>';
                    while (clusMarkers[count] != null) {


                        document.getElementById('list').innerHTML += '<div id = ' + clusMarkers[count].serviceCode + '><p style = "font-size:14px">';

                        document.getElementById('list').innerHTML += "<u href=# class='listTitle'  onclick='getNameReactive(" + '"' + clusMarkers[count].serviceCode + '"' + ")'> " + '' + clusMarkers[count].name + '' + "</a>";
                        if (clusMarkers[count].contactNum) {
                            document.getElementById('list').innerHTML += '<br>' + clusMarkers[count].contactNum +
                                '<br>' + clusMarkers[count].address + '<br>';
                        } else {
                            document.getElementById('list').innerHTML += '<br>' + clusMarkers[count].address + '<br>';
                        }

                        // document.getElementById('list').innerHTML += "<button onclick='alert(" + '"' + clusMarkers[count].serviceCode + '"' + ")'> Show more</button></p>";
                        document.getElementById('list').innerHTML += "<button type='button' class='listButton1' onclick='redirect(" + '"' + clusMarkers[count].serviceCode + '"' + ")' > View details</button>";
                        document.getElementById('list').innerHTML += "<button type='button' class='listButton2' onclick='compareListpush(" + '"' + clusMarkers[count].serviceCode + '"' + ")'> Add to compare list</button>";

                        document.getElementById('list').innerHTML += "<button type='button' class='listButton3' onclick='calculateAndDisplayRoute(clusMarkers[ " + '"' + count + '"' + "])'> Add to route</button></p>";
                        document.getElementById('list').innerHTML += '<hr></hr></div>';
                        count++;
                    }
                }

            }
            // Initialize Map
            var initMap = function() {
                geocoder = new google.maps.Geocoder();
                getPostSub = function(point, encodedPostcode, next) {
                    var pointpos = point[nextAddress - 1];
                    geocoder.geocode({
                        'latLng': new google.maps.LatLng(pointpos.lat, pointpos.lng)
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var tempPost;
                            var tempSub;
                            // If results actually exist
                            if (results[0]) {
                                // Searching for Postal Code in the address components since normally this one is volatile
                                for (var i = 0; i < results[0].address_components.length; i++) {
                                    for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                        if (results[0].address_components[i].types[j] == "postal_code") {
                                            // Get the current Postcode from the Search Box
                                            tempPost = results[0].address_components[i].long_name;
                                        }
                                    }
                                }
                                var encodedElement = tempPost;
                                encodedPostcode.push(encodedElement);

                            }
                        } else {
                            if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                                //console.log("over query");
                                nextAddress--;
                                delay++;
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                                //return "3000";

                            }
                        }
                        next();
                    });
                };


                // Create a new StyledMapType object, passing it an array of styles,
                // and the name to be displayed on the map type control.
                var styledMapType = new google.maps.StyledMapType(MapStyle, {
                    name: 'Styled Map'
                });

                directionsServiceRe = new google.maps.DirectionsService;
                directionsDisplayRe = new google.maps.DirectionsRenderer;;
                // Create a map object and specify the DOM element for display.
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: -37.81,
                        lng: 144.96
                    },
                    zoom: 12,
                    mapTypeControlOptions: {
                        mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
                    },
                    scaleControl: true,
                    gestureHandling: 'greedy',

                });
                // Set a style for the Map using the style.js
                map.mapTypes.set('styled_map', styledMapType);
                map.setMapTypeId('styled_map');

                // Infowindow for location setting
                infoWindow = new google.maps.InfoWindow;

                // Infowindow for Marker
                infowindowM = new google.maps.InfoWindow();

                // Customize Marker:
                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                var icons = {
                    Centre: {
                        name: 'Centre',
                        url: 'rsz_center05x.png',
                        scaledSize: new google.maps.Size(30, 30), // scaled size
                    },
                    Family: {
                        name: 'Family',
                        url: 'rsz_carer05x.png',
                        scaledSize: new google.maps.Size(30, 30), // scaled size
                    }

                }
                // Define Legend
                var legend = document.getElementById('legend');
                // Add element to legend
                for (var key in icons) {
                    var type = icons[key];
                    var name = type.name;
                    var icon = type.url;
                    var divPic = document.createElement('div');
                    divPic.innerHTML = '<img src="' + icon + '"> ' + name + " based Care";
                    legend.appendChild(divPic);
                }
                // Push Legend to proper place on the map
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
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
                        name: location.ServiceName,
                        contactNum: location.Phone,
                        address: location.ServiceAddress,
                        serviceCode: location.ServiceApprovalNumber,
                    });
                    // Add Marker Info using InfoWindow
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            var locationQuality = qualityDef[String(location.OverallRating)];
                            // Phone information
                            var locationPhone = String(location.Phone);
                            if (locationPhone.length === 0) {
                                locationPhone = "No Information";

                            }
                            // Fax Information
                            var locationFax = String(location.Fax);
                            if (locationFax.length === 0) {
                                locationFax = "No Information";
                            }
                            var pk = location.ServiceApprovalNumber;
                            //console.log('#' + location.ServiceApprovalNumber + location.ProviderApprovalNumber);
                            // check whether the div element exist
                            $(document).ready(function() {
                                if ($('#' + location.ServiceApprovalNumber).length) {
                                    var target = document.getElementById(location.ServiceApprovalNumber);
                                    //$('#' + location.ServiceApprovalNumber).css('background-color', "yellow");
                                    //target.style.backgroundColor = "yellow";
                                    target.parentNode.scrollTop = target.offsetTop - target.parentNode.offsetTop;

                                }

                            });
                            //console.log(pk);
                            infowindowM.setContent('<a href = "/mapApp/DataFromDatabase/index.php?pm=' + pk + '" target = "_blank"><div>' +
                                '<font color = "blue"><u><center><strong>' + location.ServiceName + '</strong></center></u></font><br>' + '</div> </a> <div>' +
                                '<strong>Address: </strong>' + location.ServiceAddress + '<br>' +
                                '<strong>Suburb: </strong>' + location.Suburb + '<br>' +
                                '<strong>Phone: </strong>' + locationPhone + '<br>' +
                                '<strong>Email: </strong>' + location['Email Address'] + '<br>' +
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

                var geocoder = new google.maps.Geocoder();
                // Try HTML5 geolocation to locate yourself.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        //console.log(pos);
                        myLocation = pos;
                        var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        // Get the Location of the current location based on postcode
                        geocoder.geocode({
                            'latLng': point
                        }, function(results, status) {
                            if (status === 'OK') {
                                // If results actually exist
                                if (results[0]) {
                                    //console.log(results[0]);
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
                                    myAddressID = results[0].place_id;
                                    myAddress = results[0].formatted_address;
                                    // InfoWindow to Print out the Result - Maybe need to add a Unique Marker here:
                                    infoWindow.setPosition(myLocation);
                                    infoWindow.setContent('Your location: ' + myAddress);
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
                // Locate Yourself

                // Create a new searching using autocomplete
                autocomplete = new AutocompleteDirectionsHandler(map, markers);

                // Filtering Position
                var filterOptions = document.getElementById('type');
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(filterOptions);

                // Dropdown Position
                var qualityOptions = document.getElementById('rating');
                qualityOptions.style['padding-left'] = '10px';
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(qualityOptions);

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
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
                                goToMyLocation(map, postcodeInfo, false);
                                writeList();

                            }
                        }
                    }
                    map.fitBounds(bounds);
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrqCrX_hFC0BN8Vue3uINhAHzPTASkWBQ&callback=initMap&libraries=places" defer></script>



    </section>
    <section class="cid-qRBh8V75zm" id="footer1-1n">





        <div class="container">
            <div class="media-container-row content text-white">
                <div class="col-12 col-md-3">
                    <div class="media-wrap">
                        <a href="https://helpinghandsmelbourne.azurewebsites.net/">
                        <img src="/assets/images/logo-192x106.png" alt="Mobirise" title="">
                    </a>
                    </div>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Address
                    </h5>
                    <p class="mbr-text">Monash University Caulfield</p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Contacts
                    </h5>
                    <p class="mbr-text">
                        Email: teamjager@gmail.com
                        <br>Phone: +61 0469859511 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br><br></p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">
                        Links
                    </h5>
                    <p class="mbr-text"><a href="https://www.mychild.gov.au/" target="_blank">mychild.gov</a><br><a href="https://www.education.gov.au/early-childhood-and-child-care-0" target="_blank">Early Childhood and Child Care</a><a href="https://www.mychild.gov.au/" target="_blank"><br></a><br></p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © Copyright 2017 Jager - All Rights Reserved
                        </p>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </section>





    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/tether/tether.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/smoothscroll/smooth-scroll.js"></script>
    <script src="../assets/dropdown/js/script.min.js"></script>
    <script src="../assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="../assets/theme/js/script.js"></script>


</body>

</html>