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

    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");

    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb;";

    $ret = $conn->query($sql);

   

    
/*
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
    
    */


 if ($ret->num_rows > 0) {
     echo '<center><div>';
        while ($row = $ret->fetch_assoc()) { 
             echo '<div class="stylecls"><b>Service :</b>'.$row['ServiceName']."<br>"
             .'<b>Provider Name :</b>'.$row['ProviderLegalName']."<br>".'</div><br><br>';
            
        }
       echo '</center></div>' ;
    }



    //echo json_encode($return);
console.log($row);
    $conn->close();
?>

</html>