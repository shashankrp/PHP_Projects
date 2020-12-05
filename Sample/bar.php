<?php  
 $connect = mysqli_connect("localhost", "root", "", "sample");  
 $query1 = "SELECT BarCode,Product,TimeStamp, count(*) as number FROM soldout GROUP BY TimeStamp";  
 $result1 = mysqli_query($connect, $query1);  
 $query = "SELECT BarCode,Product, count(*) as number FROM soldout GROUP BY Product";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Display</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">

 google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
function w3_open() {
  document.getElementById("mySidebar").style.width = "100%";
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Product','TimeStamp'],  
                          
						  <?php  		  
                          while($row = mysqli_fetch_array($result))  
                          {  
							   echo "['".$row["Product"]."',".$row["number"]."],";  
                          }  
						  
						  while($row1 = mysqli_fetch_array($result1))  
                          {  
							   echo "['".$row1["TimeStamp"]."', ".$row1["number"]."],";  
                          } 
                          ?> 
												  
                     ]);  
                var options = {  
                      title: 'Sales Details',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
				var chart1 = new google.visualization.ColumnChart(document.getElementById('pie_area'));  
                chart1.draw(data, options);  
			 
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));  
                chart.draw(data, options);  
		
		
		           }  
           </script>  
		   <style>
td {
    border:1px solid black;
}
		   </style>
      </head>  
      <body style="background-color:lightblue;"> <div class="w3-sidebar w3-bar-block w3-light-grey" style="width:15%">
	  <br/><br/><br/><br/>
  <a href="#" class="w3-bar-item w3-button">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-black">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-blue">Contact</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-red">About us</a>
</div>

<div style="margin-left:15%">

<div class="w3-teal">
  <div class="w3-container">
    <h1>My Page</h1>
  </div>
</div>
           <br /><br />  
           <div style="width:1200px;">  
                <h2 align="center">Sold out</h2><br/>
				<?php  
				$connect = mysqli_connect("localhost", "root", "", "sample");
				echo "<center><table><th>";
				$query1 = "SELECT BarCode,Product,TimeStamp, count(*) as number FROM soldout GROUP BY TimeStamp";  
				$result1 = mysqli_query($connect, $query1);
				echo "<center> BarCode     Product</center>";
				 while($row1 = mysqli_fetch_array($result1))  
                          {  
							   #echo "<center><table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row1["BarCode"]."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row1["TimeStamp"]."&nbsp;&nbsp;&nbsp;&nbsp;</table></td></tr></center>";  
                          }  
                echo "</th><th>";				
				$query = "SELECT BarCode,Product, count(*) as number FROM soldout GROUP BY Product";  
				$result = mysqli_query($connect, $query);
				echo "<center> BarCode     Product</center>";
                          while($row = mysqli_fetch_array($result))  
                          {  
							   #echo "<center><table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row["BarCode"]."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row["Product"]."&nbsp;&nbsp;&nbsp;&nbsp;</table></td></tr></center>";  
                          }  
						  echo "</th></table></center>";
                          ?>
						  
						  
				<br /><table><tr><th>  
                </th>
				<th><center style="padding-left:15%;"><div id="chart_area" style="width: 500px; height: 300px;"></th><th></div><div id="pie_area" style="width: 500px; height: 300px;"></div></center></th></tr></table>
           </div>  
      </body>  
 </html>  





