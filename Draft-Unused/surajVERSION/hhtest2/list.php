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

    
    echo $_POST['list'];
    
/*
    $query = $_POST['list'];
    
    console.log($query);
    
    $sql = "SELECT * FROM ProviderInfo p, ServiceInfo s, SuburbInfo sb WHERE p.ProviderApprovalNumber = s.ProviderApprovalNumber AND sb.Postcode = s.Postcode AND sb.Suburb = s.Suburb AND (s.Postcode like '%{$query}%' OR sb.Suburb like '%{$query}%') ;";

    $ret = $conn->query($sql);
    
    if ($ret->num_rows > 0) {
     echo '<center><div>';
        while ($row = $ret->fetch_assoc()) { 
             echo '<div class="stylecls"><b>Service :</b>'.$row['ServiceName']."<br>"
             .'<b>Provider Name :</b>'.$row['ProviderLegalName']."<br>".'</div><br><br>';
            
        }
       echo '</center></div>' ;
    }

  */  
    


    
    





    //echo json_encode($return);
    //console.log($row);
    $conn->close();
?>

</html>