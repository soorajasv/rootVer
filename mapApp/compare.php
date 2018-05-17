<script>
    var compareList = [];
    compareList = sessionStorage.getItem('services');
    
    var name = compareList.split(',');
    
    var childcare1 = String(name[2]);
    console.log(childcare1);
    console.log(compareList);
    console.log("Start!");
    
</script>

<?php
    $pm = htmlspecialchars($_GET['pm']);
   
    $serv=explode(",",$pm);


if(count($serv)== 2)
    $a = 40;
if(count($serv)== 3)
    $a = 35;
if(count($serv)== 4)
    $a = 23;

echo '<section class="container">';
echo '


        <center>
        <h2>Comparison Table</h2>
          <table class="paleBlueRows" id="compareTable">
                  <tr>
                    <td class="tableHead"><span class="columnName">Name</span></td>
                    <td class="tableHead"><span class="columnName">Service Provider</span></td>
                    <td class="tableHead"><span class="columnName">Type</span></td>
                    <td class="tableHead"><span class="columnName">Suburb</span></td>
                    <td class="tableHead"><span class="columnName">PostCode</span></td>
                    <td class="tableHead"><span class="columnName">Address</span></td>
                    <td class="tableHead"><span class="columnName">ApprovalNumber</span></td>
                    <td class="tableHead"><span class="columnName">Number Of Available Spaces</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Educational program and practice</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Children health and safety</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Physical environment</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Staffing arrangements</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Relationships with children</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Collaborative partnership</span></td>
                    <td class="tableHead"><span class="columnName">NQR:Governance and leadership</span></td>
                    <td class="tableHead"><span class="columnName">Overall Rating:</span></td>
                    <td class="tableHead"><span class="columnName">Rating Issued:</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Mon</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Tue</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Wed</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Thu</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Fri</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Sat</span></td>
                    <td class="tableHead"><span class="columnName">Opening Hours:Sun</span></td>
                    <td class="tableHead"><span class="columnName">Phone Number</span></td>
                    <td class="tableHead"><span class="columnName">E-mail</span></td>
                  </tr>';

for($i=0;$i< count($serv);$i++ )
{
    header("Content-type: text/html; charset=utf-8；Access-Control-Allow-Origin: *");
    include  "config.php";
    $data = array();
    //$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

    if ($conn->connect_error) {
        die("Connection failed.".$conn->connect_error);
    }

    $conn->query("SET NAMES utf8");
    //$pm = htmlspecialchars($_GET['pm']);
   // echo $pm;
    $sql = "SELECT * FROM EducationExport e WHERE e.ServiceApprovalNumber = '{$serv[$i]}'";

    $ret = $conn->query($sql);
    

    if ($ret->num_rows > 0) {
        
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

            echo'
            <tr>
              <td class="tableHead"><span class="columnName">'.$row['ServiceName'].'</span></td>
              <td>'.$row['ProviderLegalName'].'</td>
              <td>'.$row['ServiceType'].'</td>
              <td>'.$row['Suburb'].'</td>
              <td>'.$row['Postcode'].'</td>
              <td>'.$row['ServiceAddress'].'</td>
              <td>'.$row['ServiceApprovalNumber'].'</td>
              <td>'.$NumberOfApprovedPlaces.'</td>
              <td>' . $QualityArea1Rating . '</td>
              <td>' . $QualityArea2Rating . '</td>
              <td>' . $QualityArea3Rating . '</td>
              <td>' . $QualityArea4Rating . '</td>
              <td>' . $QualityArea5Rating . '</td>
              <td>' . $QualityArea6Rating . '</td>
              <td>' . $QualityArea7Rating . '</td>
              <td>' . $OverallRating . '</td>
              <td>' . $RatingsIssued . '</td>
              <td>' . $Monday . '</td>
              <td>' . $Tuesday . '</td>
              <td>' . $Wednesday . '</td>
              <td>' . $Thursday . '</td>
              <td>' . $Friday . '</td>
              <td>' . $Saturday . '</td>
              <td>' . $Sunday . '</td>
              <td>'.$row['Phone'].'</td>
              <td>'.$row['Email Address'].'</td>
            </tr>
            ';            
            
         $data[] = $row;      
    }

    
    
}
    
   // for loop ending 
    
}
echo '
  </table>
  <span>NQR: National Quality Rating</span>
  <br>
  <span>NQS: National Quality Standard</span>
  <br>
  </center>';
echo '</section>';
    $conn->close(); 
      
?>


<html>
  <style>
    .tableHead{
      background: #0B6FA4;
      border: 5px solid #FFFFFF;
    }

    table.paleBlueRows {
      font-family: "Times New Roman", Times, serif;
      border: 1px solid #FFFFFF;
      text-align: center;
      border-collapse: collapse;
    }

    table.paleBlueRows td, table.paleBlueRows th {
      border: 1px solid #FFFFFF;
      padding: 3px 2px;
    }

    table.paleBlueRows tbody td {
      font-size: 13px;
    }

    table.paleBlueRows tr:nth-child(odd) {
      background: #D0E4F5;
    }

    table.paleBlueRows thead th:first-child {
      border-left: none;
    }
/*    table, th, td {
      border: 1px solid black;
    }*/
            
    .container1{
      width: 90%;
      height: 700px;
      margin: auto;
      padding: 10px;
    }    

    .columnName{
      color: white;
      font-weight: bold; 
    }
  </style>

  <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script >
        $("#compareTable").each(function() {
        var $this = $(this);
        var newrows = [];
        $this.find("tr").each(function(){
            var i = 0;
            $(this).find("td").each(function(){
                i++;
                if(newrows[i] === undefined) { newrows[i] = $("<tr></tr>"); }
                newrows[i].append($(this));
            });
        });
        $this.find("tr").remove();
        $.each(newrows, function(){
            $this.append(this);
        });
        console.log("Rotate!");
      }); 
    </script>
  </head>
  <body>
  
  </body>
</html>