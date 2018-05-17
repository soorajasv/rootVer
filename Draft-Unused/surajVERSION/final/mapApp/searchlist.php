<?php 
   header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";

    $return = array(); 
    $data = array();

   // echo "haii";
    //$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");



if (isset($_REQUEST['query'])) {

    $query = $_REQUEST['query'];
    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb AND (s.ServiceApprovalNumber like '%{$query}%' OR  s.ServiceName like '%{$query}%' OR s.Postcode like '%{$query}%' OR sb.Suburb like '%{$query}%') ;";

    $ret = $conn->query($sql);
    
     if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) { 
            
             $array[] = array (
            'label' => $row['ServiceApprovalNumber'].','.$row['ServiceName'].','.$row['Postcode'].','.$row['Suburb'],
            'value' => $row['ServiceApprovalNumber'].','.$row['ServiceName'].','.$row['Postcode'].','.$row['Suburb'],
        );
        }

 }
   
    echo json_encode ($array);

}    //echo json_encode($return);
console.log($row);
    $conn->close();
?>