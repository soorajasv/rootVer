<script>
    var compareList = [];
    compareList = sessionStorage.getItem('services');
    
    var name = compareList.split(',');
    
    var childcare1 = String(name[2]);
    console.log(childcare1);
    console.log(compareList);
    
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

for($i=0;$i< count($serv);$i++ )
{
    
    
   // $a= $a+20;
    
    
    



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
        echo '<body>
        
        <div  style="padding=20px;width:'.$a.'%;float : left;left :'.$a*($i).'%;position : fixed;top : 30px;"><table>';
        while ($row = $ret->fetch_assoc()) { 
            
           echo '<center><div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Service Details</h2>
            <hr class="my-4">
            <p class="mb-5"><b>Name</b> : '.$row['ServiceName'].'<br>
            <b>Type</b> : '.$row['ServiceType'].'<br>
            <b>Address</b> : '.$row['ServiceAddress'].'<br>
            <b>Approval Number</b> : '.$row['ServiceApprovalNumber'].'
            </p>
            
          </div>
        </div>';
            
            echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading"> Quality Rating</h2>
            <hr class="my-4">
            <p class="mb-5"><b>National Quality Standard Area1 rating</b> : '.$row['QualityArea1Rating'].'<br></p>
            

             </div>
        </div>';
            
            
             echo '<div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Address</h2>
            <hr class="my-4">
            <p class="mb-5"><b>State</b> : '.$row['State'].'<br>
            <b>Suburb</b> : '.$row['Suburb'].'<br>
            <b>Post Code</b> : '.$row['PostCode'].'
            </p>
            
          </div>
        </div>';
            
            
            
            echo '<div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Contact</h2>
            <hr class="my-4">
            <p class="mb-5">Contact Childcare center for any further details</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>'.$row['Phone'].'</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              '.$row['Email Address'].'
            </p>
          </div>
        </div>
      </div></center>';
            
            
            
            
            
      
          /*  echo '<tr><td><b> Phone</b></td><td>'.$row['Phone'].'</td></tr>';
            
            echo '<tr><td><b> Email</b></td><td>'.$row['Email Address'].'</td></tr>';
           
            echo '<tr><td>MON</td>';
            if($row['School Terms Only Session 1 Monday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Monday Start Time'].' - '.$row['School Terms Only Session 1 Monday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>TUES</td>';
            if($row['School Terms Only Session 1 Tuesday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Tuesday Start Time'].' - '.$row['School Terms Only Session 1 Tuesday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>WED</td>';    
            if($row['School Terms Only Session 1 Wednesday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Wednesday Start Time'].' - '.$row['School Terms Only Session 1 Wednesday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>THU</td>';
            if($row['School Terms Only Session 1 Thursday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Thursday Start Time'].' - '.$row['School Terms Only Session 1 Thursday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>FRI</td>';
            if($row['School Terms Only Session 1 Friday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Friday Start Time'].' - '.$row['School Terms Only Session 1 Friday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>SAT</td>';
            if($row['School Terms Only Session 1 Saturday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Saturday Start Time'].' - '.$row['School Terms Only Session 1 Satuday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
            echo '<tr><td>SUN</td>';
            if($row['School Terms Only Session 1 Sunday Start Time']!= NULL)
                { echo '<td>'.$row['School Terms Only Session 1 Sunday Start Time'].' - '.$row['School Terms Only Session 1 Sunday End Time'].'</td>';}
                 else
                 {echo "<td>N/A</td></tr>";}
                 
                 */
            
            
         $data[] = $row;
        
        echo '</table></div>';
        echo '</body>';
        
       
        
    }
    //echo $data;

    //echo json_encode($return);
    
    
    
}
    
   // for loop ending 
    
}

echo '</section>';

    $conn->close(); 




 
      
?>

<html>
        <style>
            .container1{
                width: 90%;
                height: 700px;
                margin: auto;
                padding: 10px;
            }    

        </style>

</html>