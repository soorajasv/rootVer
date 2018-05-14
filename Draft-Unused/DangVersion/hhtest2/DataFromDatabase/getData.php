<?php 
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";

    $return = array(); 
    $data = array();

    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");

    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb;";

    $ret = $conn->query($sql);

    if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) { 
            $data[] = $row;
        }
        $return['result'] = 1;
        $return['data'] = $data;
    }

    //echo json_encode($return);

    $conn->close();
?>