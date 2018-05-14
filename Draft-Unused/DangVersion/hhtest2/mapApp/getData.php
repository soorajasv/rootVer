<?php 
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";

    $return = array(); 
    $data = array();

$conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");

    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb, placeid pl WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb AND pl.ServiceApprovalNumber = s.ServiceApprovalNumber;";

    $ret = $conn->query($sql);

    if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) { 
            /*
            $tmp = array();
            $tmp['ServiceName'] = $row['ServiceName'];
            $tmp['ProviderLegalName'] = $row['ProviderLegalName'];
            $tmp['ServiceType'] = $row['ServiceType'];
            $tmp['ServiceAddress'] = $row['ServiceAddress'];
            $tmp['Suburb'] = $row['Suburb'];
            $tmp['state'] = $row['state'];
            $tmp['Postcode'] = $row['Postcode'];
            $tmp['Phone'] = $row['Phone'];
            $tmp['Fax'] = $row['Fax'];
            $tmp['Email Address'] = $row['Email Address'];
            $tmp['NumberOfApprovedPlaces'] = $row['NumberOfApprovedPlaces'];
            $tmp['OverallRating'] = $row['OverallRating'];
            $tmp['lat'] = (float)$row['lat'];
            $tmp['lng'] = (float)$row['lng'];
            $data[] = $tmp;
            */
            $data[] = $row;
        }
        $return['result'] = 1;
        $return['data'] = $data;
    }

    //echo json_encode($return);

    $conn->close();
?>