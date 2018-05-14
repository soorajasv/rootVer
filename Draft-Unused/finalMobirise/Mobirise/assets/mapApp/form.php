<?php 
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";

    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");

$term = mysql_real_escape_string($_REQUEST['term']);    

$sql = "SELECT * FROM ServiceInfo WHERE PostCode LIKE '%".$term."%'";
$r_query = mysql_query($sql);

while ($row = mysql_fetch_array($r_query)){ 
echo 'Primary key: ' .$row['PRIMARYKEY'];  
}
    //echo json_encode($return);

    $conn->close();
?>