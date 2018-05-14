<?php 
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";
    $data = array();
    $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");
    $pm = htmlspecialchars($_GET['pm']);
    echo $pm;
    $sql = "SELECT * FROM EducationExport e WHERE e.ServiceApprovalNumber = '{$pm}'";

    $ret = $conn->query($sql);

    if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) { 
            echo $row['ServiceApprovalNumber'];
            echo $row['QualityArea1Rating'];
            $data[] = $row;
        }
        
        $return['result'] = 1;
        $return['data'] = $data;
        
    }
    //echo $data;

    //echo json_encode($return);

    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <script type="text/javascript">
        /*
        
        var infoDetail = info.data;
        console.log(infoDetail[1]);
        console.log(Object.keys(infoDetail[1]).length);
        */
    </script>
    
</body>
</html>

