


<?php
include('../connect/connect.php');


session_start();
$ID = $_SESSION['id'];

$daterange = $_POST['daterange'];
$date1 = DATE('d/m/Y',strToTime(substr($daterange,0,10)));
$date2 = DATE('d/m/Y',strToTime(substr($daterange,14,10)));


              
					    include('../connect/connect.php');
					    $query=mysqli_query($conn,"Select * from `student_info`,`attendancelogs` WHERE Date BETWEEN '$date1' AND '$date2' AND student_info.RFID = attendancelogs.RFID AND attendancelogs.id = '$ID'  order by Ordering DESC" );
					    while($row=mysqli_fetch_array($query)){
						  	
						  echo "<tr>";
							
              echo "<td>";  echo $row['FirstName']; echo "</td>";
              echo "<td>";  echo $row['LastName']; echo "</td>";
              echo "<td>";  echo $row['Grade']; echo "</td>";
              echo "<td>";  echo $row['Section']; echo "</td>";
              echo "<td>";  echo $row['Date']; echo "</td>";
              echo "<td>";  echo $row['Time']; echo "</td>";
              echo "<td>";  echo $row['Subject']; echo "</td>";
              
             echo "</tr>";
						  
                }
                
?>

<script>

</script>
