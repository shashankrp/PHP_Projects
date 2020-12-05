<?php

include('database_connection.php');

if(isset($_POST["Product"]))
{
 $query = "SELECT * FROM soldout WHERE Product = '".$_POST["Product"]."' ORDER BY id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'profit'  => floatval($row["profit"])
  );
 }
 echo json_encode($output);
}

?>