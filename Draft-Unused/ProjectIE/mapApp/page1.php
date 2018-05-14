<!DOCTYPE html>

<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

echo '<style type="text/css">#checkMob{
display:none;
}</style>';

?>




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
  <link rel="shortcut icon" href="../assets/images/logo-122x67.png" type="image/x-icon">
  <meta name="description" content="Web Site Builder Description">
  <title>Map application</title>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
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

    <script src="./jquery-csv-master/src/jquery.csv.min.js"></script>
    <script src="./jquery-csv-master/src/jquery.csv.js"></script>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="./PapaParse/papaparse.min.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="application.css" rel="stylesheet" type="text/css">


    <!-- Side bar sytle -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
     <!-- Custom scripts for searching childcare from database -->
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    <!--https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>


    
    

    <!-- Suraj Code -->
    <script>
       $(document).ready(function() {

            $('input.city').typeahead({
                name: 'city',
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
    
        

        .twitter-typeahead {
            width: 80%;
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 30px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        
       

    
        .content {
            width: 80%;
            margin: 0 auto;
            margin-top: 50px;
        }

        .tt-hint,
        .city {
            border: 2px solid #CCCCCC;
            border-radius: 8px 8px 8px 8px;
            font-size: 24px;
            height: 45px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 400px;
        }

        .tt-dropdown-menu {
            width: 400px;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
    
    
    }
    
    
    
    
    
    
        .listdiv {
            height: 90%;
            width: 18%;

            text-align: center;
            float: left;
            right: 20px;
            top: 60px;
            
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);

            overflow: auto;
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
                    <a href="index.html">
                         <img src="../../assets/images/logo-122x67.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="../index.html">Helping Hands</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-white display-4" href="../page3.html#slider1-s" data-toggle="dropdown-submenu" aria-expanded="false">
                        Did you know</a><div class="dropdown-menu"><div class="dropdown"><a class="dropdown-item text-white dropdown-toggle display-4" href="../page3.html#content4-1g" data-toggle="dropdown-submenu" aria-expanded="false">Infographics</a><div class="dropdown-menu dropdown-submenu"><a class="dropdown-item text-white display-4" href="../page3.html#slider1-s">New child care subsidy</a><a class="dropdown-item text-white display-4" href="../page3.html#slider1-s">Tips for choosing a childcare</a><a class="dropdown-item text-white display-4" href="../page3.html#slider1-s">National quality standard frame</a></div></div><a class="dropdown-item text-white display-4" href="../page3.html#timeline2-t">How can I enroll my kid into a child care<br></a><a class="dropdown-item text-white display-4" href="../page4.html#info2-z">Average fee for suburbs in VIC<br></a></div></li><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="../page1.html"><font face="MobiriseIcons"><span style="font-size: 25.6px;">&nbsp; &nbsp; &nbsp;</span></font> Find a child care &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="page2.html">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; About Us &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="page1.html"></a></li></ul>
            
        </div>
    </nav>
</section>

    
    
<!-- map code -->
    
    
    
    
    

<section class="map1 cid-qR8TV7EJrt" style = "height : 100%;margin-top:4%;" id="map1-w">

     

     <div id="sidebar" style="align-content: center; float: left; width :20%;  height:90%; margin-left: 1%;padding: 10px; margin-bottom: 1%; background-color: #edece4; background-image: url('https://www.transparenttextures.com/patterns/blizzard.png');color: white; border: 1px solid #ccc; border: 1px solid rgba(0, 0, 0, 0.2);">

        <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Search for childcare</label>

        <input type="text" name="city" size="30" class="city" placeholder="Please Enter City or ZIP code">

         
        <button id="go" onclick="resetName = true; resetListing(); getName();"></button>

        <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Select a Suburb</label>
        <input id="pac-input" style="margin-top: 0px" class="controls" type="text" placeholder="Search ">
        <button id="suburbPlace" onclick="goToMyLocation(map);"></button>

        <label for="" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px ">Search along your way</label>

        <input id="origin-input" class="controls" type="text" placeholder="Choose starting point" style="margin-top: 0px">
        <button id="originPlace" onclick="document.getElementById('origin-input').value = myAddress; autocomplete.originPlaceId = myAddressID;"></button>

        <input id="destination-input" class="controls" type="text" placeholder="Choose destination">
        <button id="destinationPlace" onclick="document.getElementById('destination-input').value = myAddress; autocomplete.destinationPlaceId = myAddressID;"></button>

        <div id="mode-selector" class="controls" style="background-color: white;color: black; max-width: 70%,">
            <input type="radio" name="type" id="changemode-transit" checked="checked">
            <label for="changemode-transit" style="font-size: 16px">PTV</label>

            <input type="radio" name="type" id="changemode-driving" >
            <label for="changemode-driving" style="font-size: 16px">Driving</label>
        </div>


        <label for="type" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px">Select Childcare type</label>

        <select id="type" class="controls" style="margin-top: 0px" onchange="markerCategory = this.value; filterMarkers(this.value, postcodeInfo, qualityStandard, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Centre">Centre Based Care</option>
            <option value="Family">Family Day Care</option>
            </select>


        <label for="rating" style="align-content: space-around;font-size: 16px;font-family: sans-serif;color: dimgray;padding-left: 10px;padding-top: 10px ">Select Childcare rating, NQS - National Quality Standard</label>

        <select id="rating" class="controls" style="margin-top: 0px" onchange="reset = false;  qualityStandard = this.value; filterMarkers(markerCategory, postcodeInfo, this.value, markerCluster, reset);">
            <option value="" selected>All Categories</option>
            <option value="Exceeding">Exceeding NQS</option>
            <option value="Meeting">Meeting NQS</option>
            <option value="Not">Not Meeting NQS</option>
        </select>



    </div>
    <div id="map" style="  height:90%; float:left; width: 57%; background-color:silver; padding: 10px; margin-right: 1%;  margin-left: 1%; margin-bottom: 1%; align-content: center"></div>
    <div id="list" class="listdiv"></div>





    <div id="legend">

    </div>
         
         
     <!--application script -->
            <script>
        /*
                                border: 2px solid #CCCCCC;
                                    border-radius: 8px 8px 8px 8px;
                                    font-size: 24px;
                                    height: 45px;
                                    line-height: 30px;
                                    outline: medium none;
                                    padding: 8px 12px;
                                    */
        function showhide() {
            if (document.getElementById("list")) {
                var x = document.getElementById("list");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        }
        var desButton = document.getElementById("destinationPlace");
        desButton.innerHTML = '<img src="' + "ic.png" + '"> ';
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
        // Pirntout
        var myAddressID = "ChIJm7IcwrhC1moREDUuRnhWBBw";

        // Reactive to the search
        function getName() {
            var name = (document.getElementById("childcare").value).split(',');
            var childCareName = String(name[2]);
            var cont = true;
            var i = 0;
            if (resetName) {
                reset = true;
                markerCategory = "";
                qualityStandard = "";
                postcodeInfo = "";
                filterMarkers(markerCategory, postcodeInfo, qualityStandard, markerCluster, reset);
            }

            while (cont) {
                if (childCareName == String(markers[i].name)) {
                    //console.log(markers[markernow].name);
                    cont = false;
                    google.maps.event.trigger(markers[i], 'click');
                }
                i++;

            }
        }

        function getNameReactive(name) {
            var childCareName = String(name);
            var cont = true;
            var i = 0;

            while (cont) {
                if (childCareName == String(markers[i].name)) {
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
                markerCategory = "";
                qualityStandard = "";
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
                while (clusMarkers[count] != null) {

                    document.getElementById('list').innerHTML += '<p style = "font-size:14px">';
                    document.getElementById('list').innerHTML += "<a href=# onclick='getNameReactive(" + '"' + clusMarkers[count].name + '"' + ")'> " + '' + clusMarkers[count].name + '' + "</a>";

                    document.getElementById('list').innerHTML += '<br>' + clusMarkers[count].contactNum +
                        '<br>' + clusMarkers[count].address + '<br>';

                    document.getElementById('list').innerHTML += "<button onclick='alert(" + '"' + clusMarkers[count].serviceCode + '"' + ")'> Show more</button></p>";
                    document.getElementById('list').innerHTML += "<button onclick='compareList.push(" + '"' + clusMarkers[count].serviceCode + '"' + ")'> Record</button></p>";
                    document.getElementById('list').innerHTML += '<hr></hr>';
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
                        //console.log(pk);
                        infowindowM.setContent('<a href = "/surajVERSION/hhtest2/DataFromDatabase/index.php?pm=' + pk + '" target = "_blank"><div>' +
                            '<strong>' + location.ServiceName + '</strong><br>' + '</div> </a> <div>' +
                            '<strong>Provider: </strong>' + location.ProviderLegalName + '<br>' +
                            '<strong>Address: </strong>' + location.ServiceAddress + '<br>' +
                            '<strong>Suburb: </strong>' + location.Suburb + '<br>' +
                            '<strong>State: </strong>' + location.state + '<br>' +
                            '<strong>Phone: </strong>' + locationPhone + '<br>' +
                            '<strong>Fax: </strong>' + locationFax + '<br>' +
                            '<strong>Email: </strong>' + location['Email Address'] + '<br>' +
                            '<strong>Occupancy: </strong>' + location.NumberOfApprovedPlaces + '<br>' +
                            '<strong>Overall Rating: </strong>' + locationQuality + '<br>' +
                            '</div>' +
                            '<a href = "#" onclick = "compareList.push(location.ServiceApprovalNumber); console.log(compareList);"> Record Childcare</a>');
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
                                infoWindow.setContent('You are here: ' + myAddress);
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
            /*
            var locateSelfDiv = document.createElement('div');
            var locateSelf = new LocateControl(locateSelfDiv, map);
            // Locate Button Position on the Map
            locateSelfDiv.index = 1;
            locateSelfDiv.style['padding-left'] = '10px';
            locateSelfDiv.style['padding-top'] = '10px';
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(locateSelfDiv);
            */
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
                            filterSuburbs(postcodeInfo);
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
    
    
    
<!-- map code ends-->     
    

<section class="cid-qR8TZfNRjd" id="footer1-x">

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="https://mobirise.com/">
                        <img src="assets/images/logo-192x106.png" alt="Mobirise" title="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">Monash University Caulfild</p>
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
                <p class="mbr-text">
                    <a class="text-primary" href="https://mobirise.com/">Website builder</a>
                    <br><a class="text-primary" href="https://mobirise.com/mobirise-free-win.zip">Download for Windows</a>
                    <br><a class="text-primary" href="https://mobirise.com/mobirise-free-mac.zip">Download for Mac</a>
                </p>
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
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.behance.net/Mobirise" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/popper/popper.min.js"></script>
  <script src="../assets/tether/tether.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/smoothscroll/smooth-scroll.js"></script>
  <script src="../assets/dropdown/js/script.min.js"></script>
  <script src="../assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="../assets/theme/js/script.js"></script>
  
  
</body>
</html>