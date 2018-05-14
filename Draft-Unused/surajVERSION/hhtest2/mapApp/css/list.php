<html>
    
<style>

    .stylecls
    {
        height: 70px;
        width: 400px;
        font-family: sans-serif;
        font-size: 15px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        
        
    }
    
    
</style>        
    
    
    
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

    
    echo $_POST['city'];
    $name = $_POST['city'];
    $name = explode(',',$name);
    $childcare = $name[2];
    
    //echo $childcare;
    
    
    

    $query = $childcare;
    
    console.log($query);
    
    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb AND s.ServiceName = '$query' ;";

    $ret = $conn->query($sql);
 /*   
    if ($ret->num_rows > 0) {
     echo '<center><div>';
        while ($row = $ret->fetch_assoc()) { 
             echo '<div class="stylecls"><b>Service :</b>'.$row['ServiceName']."<br>"
             .'<b>Provider Name :</b>'.$row['ProviderLegalName']."<br>".'</div><br><br>';
            
        }
       echo '</center></div>' ;
    }

*/

    if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) { 
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
        }
        $return['result'] = 1;
        $return['data'] = $data;
    }
    
    
    
    
    


    //echo json_encode($return);
    //console.log($row);
    $conn->close();
?>

</html>