<?php
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";

    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
 
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM ServiceInfo WHERE Postcode  = 3145"; 
$r_query = mysql_query($sql); 

while ($row = mysql_fetch_array($r_query)){  
echo 'Primary key: ' .$row['PRIMARYKEY'];  
echo '<br /> ServiceName: ' .$row['ServiceName'];  
}  

}
?>
    </body>
</html>