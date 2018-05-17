<?php
header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
include "config.php";
$data = array();
//$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
mysqli_real_connect($conn, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if ($conn->connect_error) {
    die("Connection failed." . $conn->connect_error);
}

$conn->query("SET NAMES utf8");
$pm  = htmlspecialchars($_GET['pm']);
// echo $pm;
$sql = "SELECT * FROM EducationExport e WHERE e.ServiceApprovalNumber = '{$pm}'";

$ret = $conn->query($sql);

if ($ret->num_rows > 0) {
    echo '<body>
        <div class="se-pre-con"></div>
        <center><div class="stylecls" style="padding=20px;width:85%;"><table>';
    
    while ($row = $ret->fetch_assoc()) {
        $Monday =  "No Information Available";
        $Tuesday =  "No Information Available";
        $Wednesday =  "No Information Available";
        $Thursday =  "No Information Available";
        $Friday =  "No Information Available";
        $Saturday =  "No Information Available";
        $Sunday =  "No Information Available";

        if ($row['School Terms Only Session 1 Monday Start Time'] != NULL) {
            $Monday =   $row['School Terms Only Session 1 Monday Start Time'] . ' - ' . $row['School Terms Only Session 1 Monday End Time'];
        }
        if ($row['School Terms Only Session 1 Tuesday Start Time'] != NULL) {
            $Tuesday =  $row['School Terms Only Session 1 Tuesday Start Time'] . ' - ' . $row['School Terms Only Session 1 Tuesday End Time'];
        }
        if ($row['School Terms Only Session 1 Wednesday Start Time'] != NULL) {
            $Wednesday =  $row['School Terms Only Session 1 Wednesday Start Time'] . ' - ' . $row['School Terms Only Session 1 Wednesday End Time'];
        }
        if ($row['School Terms Only Session 1 Thursday Start Time'] != NULL) {
            $Thursday = $row['School Terms Only Session 1 Thursday Start Time'] . ' - ' . $row['School Terms Only Session 1 Thursday End Time'];
        }
        if ($row['School Terms Only Session 1 Friday Start Time'] != NULL) {
            $Friday = $row['School Terms Only Session 1 Friday Start Time'] . ' - ' . $row['School Terms Only Session 1 Friday End Time'];
        }
        if ($row['School Terms Only Session 1 Saturday Start Time'] != NULL) {
            $Saturday = $row['School Terms Only Session 1 Saturday Start Time'] . ' - ' . $row['School Terms Only Session 1 Satuday End Time'];
        }
        if ($row['School Terms Only Session 1 Sunday Start Time'] != NULL) {
            $Sunday =  $row['School Terms Only Session 1 Sunday Start Time'] . ' - ' . $row['School Terms Only Session 1 Sunday End Time'];
        }

        $NumberOfApprovedPlaces = "No Information Available";
        $QualityArea1Rating = "No Information Available";
        $QualityArea2Rating = "No Information Available";
        $QualityArea3Rating = "No Information Available";
        $QualityArea4Rating = "No Information Available";
        $QualityArea5Rating = "No Information Available";
        $QualityArea6Rating = "No Information Available";
        $QualityArea7Rating = "No Information Available";
        $OverallRating = "No Information Available";
        $RatingsIssued = "No Information Available";
        $Phone = "No Information Available";
        $Email = "No Information Available";

        if ($row['NumberOfApprovedPlaces'] != NULL) {
            $NumberOfApprovedPlaces =   $row['NumberOfApprovedPlaces'];
        }
        if ($row['QualityArea1Rating'] != NULL) {
            $QualityArea1Rating =  $row['QualityArea1Rating'];
        }
        if ($row['QualityArea2Rating'] != NULL) {
            $QualityArea2Rating =  $row['QualityArea2Rating'];
        }
        if ($row['QualityArea3Rating'] != NULL) {
            $QualityArea3Rating = $row['QualityArea3Rating'];
        }
        if ($row['QualityArea4Rating'] != NULL) {
            $QualityArea4Rating = $row['QualityArea4Rating'];
        }
        if ($row['QualityArea5Rating'] != NULL) {
            $QualityArea5Rating = $row['QualityArea5Rating'];
        }
        if ($row['QualityArea6Rating'] != NULL) {
            $QualityArea6Rating =  $row['QualityArea6Rating'];
        }
        if ($row['QualityArea7Rating'] != NULL) {
            $QualityArea7Rating =  $row['QualityArea7Rating'];
        }
        if ($row['OverallRating'] != NULL) {
            $OverallRating =  $row['OverallRating'];
        }
        if ($row['RatingsIssued'] != NULL) {
            $RatingsIssued =  $row['RatingsIssued'];
        }
        if ($row['Phone'] != NULL) {
            $Phone =  $row['Phone'];
        }
        if ($row['Email Address'] != NULL) {
            $Email =  $row['Email Address'];
        }

        // Service Detail
        echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Service Details</h2>
            <hr class="my-4">
            <p class="mb-5"><b>Name</b> : ' . $row['ServiceName'] . '<br>
            <b>Service Approval Number</b> : ' . $row['ServiceApprovalNumber'] . '<br>
            <b>Service Type</b> : ' . $row['ServiceType'] . '<br>
            <b>Number Of Available Spaces</b> : ' . $NumberOfApprovedPlaces . '<br>
            <b>Service Provider</b> : ' . $row['ProviderLegalName'] . '
            </p>
            
          </div>
        </div>';
        // Address
        echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Address</h2>
            <hr class="my-4">
            <p class="mb-5">
            <b>Address</b> : ' . $row['ServiceAddress'] . '<br>
            <b>Suburb</b> : ' . $row['Suburb'] . '<br>
            <b>Post Code</b> : ' . $row['Postcode'] . '
            </p>
            
          </div>
        </div>';
        // Quality Rating
        echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading"> Quality Rating</h2>
            <hr class="my-4">
            <p class="mb-5"><b>Educational program and practice</b> : ' . $QualityArea1Rating . '<br>
            <b>Children health and safety</b> : ' . $QualityArea2Rating . '<br>
            <b>Physical environment</b> : ' . $QualityArea3Rating . '<br>
            <b>Staffing arrangements</b> : ' . $QualityArea4Rating . '<br>
            <b>Relationships with children</b> : ' . $QualityArea5Rating . '<br>
            <b>Collaborative partnership</b> : ' . $QualityArea6Rating . '<br>
            <b>Governance and leadership</b> : ' . $QualityArea7Rating . '<br>
            <b>Overall Rating</b> : ' . $OverallRating . '<br>
            <b>Rating Issued</b> : ' . $RatingsIssued . '<br></p>
             </div>
        </div>';

        echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading"> Weekly Opening Hours</h2>
            <hr class="my-4">
            <p class="mb-5"><b>Monday</b> : ' . $Monday . '<br>
            <b>Tuesday</b> : ' . $Tuesday . '<br>
            <b>Wednesday</b> : ' . $Wednesday . '<br>
            <b>Thursday</b> : ' . $Thursday . '<br>
            <b>Friday</b> : ' . $Friday . '<br>
            <b>Saturday</b> : ' . $Saturday . '<br>
            <b>Sunday</b> : ' . $Sunday . '<br></p>
             </div>
        </div>';
        
        // Contact Details
        echo '<div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Contact Details</h2>
            <hr class="my-4">
            <p class="mb-5">Contact the Childcare Service for any further details</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>' . $Phone . '</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              ' . $Email . '
            </p>
          </div>
        </div>
      </div>';
        
        
        $data[] = $row;
    }
    echo '</table></div></center>';
    echo '</body>';
    
    $return['result'] = 1;
    $return['data']   = $data;
    
}
//echo $data;

//echo json_encode($return);

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <style>
        .stylecls {
            height: 100%;
            width: 100%;
            font-family: sans-serif;
            font-size: 15px;
            /*      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
        }


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
            background: url(img/loader3.gif) center no-repeat #fff;
        }

        .shadow {
            /*        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <script>
        $(window).load(function() {

            //$(".se-pre-con").fadeOut("slow");;
            setTimeout(function() {
                $(".se-pre-con").fadeOut('slow', function() {});
            }, 500);
        });
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" />

    <title>Helping Hands</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
 -->
    <!-- Latest compiled and minified JavaScript -->
    <!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> -->

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> -->

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link href="css/helpinghands.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/map.css">
</head>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</html>

