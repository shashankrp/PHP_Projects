<?php  
 $connect = mysqli_connect("localhost", "root", "", "sample");  
 $query = "SELECT BarCode,Product,TimeStamp, count(*) as number FROM soldout GROUP BY TimeStamp";  
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
                var data = google.visualization.arrayToDataTable()[  
                          ['TimeStamp', 'Number'],  
                          
						  <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
							   echo "['".$row["TimeStamp"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {
        title: 'Total stocks',
        width: 900,
        height: 500,
        is3D: true,
    };
					  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
						chart.draw(data, options);
                //var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_area'));  
                //chart1.draw(data, options);  
		
		
		           }  
           </script>  
		   <style>
td {
    border:1px solid black;
}
		   </style>
      </head>  
      <body> <div class="w3-sidebar w3-bar-block" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">=</button>
  <div class="w3-container">
    <h1>My Page</h1>
  </div>
</div>
           <br /><br />  
           <div style="width:1200px;">  
                <h2 align="center">Sold out</h2><br/>
				<?php  
				$connect = mysqli_connect("localhost", "root", "", "sample");  
				$query = "SELECT BarCode,Product,TimeStamp, count(*) as number FROM soldout GROUP BY TimeStamp";  
				$result = mysqli_query($connect, $query);
				echo "<center> BarCode     Product</center>";
                          while($row = mysqli_fetch_array($result))  
                          {  
							   echo "<center><table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row["BarCode"]."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row["TimeStamp"]."&nbsp;&nbsp;&nbsp;&nbsp;</table></td></tr></center>";  
                          }  
                          ?>
						  
						  
				<br /><center><table><tr><th>  
                </th><div id="piechart" style="width: 500px; height: 300px;"> 
				<th><!--<div id="chart_area" style="width: 500px; height: 300px;">--></div></th></tr></table></center>
           </div>  
      </body>  
 </html>  





