<?php

$param = $_POST['param'];   
$out = $_POST['outTime'];
$in = $_POST['inTime'];  

$param = strtr($param, '-_', '+/');
///$out = base64_decode($out);  
//$in = base64_decode($in); 





$rtn="<table id='myTable2' class='w3-table w3-striped' > <tr><th onclick=' sortTable(0)'>IC</th><th onclick=' sortTable(1)'>Location</th><th onclick='sortTable(2)'>In Time</th><th onclick=' sortTable(3)'>Out Time</th></tr>";



$servername = "Cweedsolution.ddns.net";
$username = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `checktable` WHERE( (`In_Time` BETWEEN '".$in."' AND '".$out."') or (`out_time` BETWEEN '".$in."' AND '".$out."') ) AND `address`='".$param."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
       $IC=$row["ic"];
       $dbadd= $row["address"];
       $dbIN= $row["In_Time"];
       $dbOUT= $row["out_time"];


      

//checkIC exist


$rtn.='<tr   id = "table1'.$IC.'"onclick=clicktest1("'.$IC.'")><td id="">'.$IC.'</td><td>'.$dbadd.'</td><td>'.$dbIN.'</td><td>'.$dbOUT.'</td></tr>';

    }
} else {
   // echo "Check out:".$checkout."Check in:".$checkin."";
}




$rtn.="</table>";
echo $rtn;


//echo "hello in: ".$in."   out: ".$out;

?>