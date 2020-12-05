<?php  
 $connect = mysqli_connect("localhost", "root", "", "sample");  
 $query1 = "SELECT BarCode,Product,TimeStamp, count(*) as number FROM soldout GROUP BY TimeStamp";  
 $result1 = mysqli_query($connect, $query1);  
 $query = "SELECT BarCode,Product, count(*) as number FROM soldout GROUP BY Product";  
 $result = mysqli_query($connect, $query);  
 
 ?>  

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php  		  
                          while($row = mysqli_fetch_array($result))  
                          {  
							   echo "['".$row["Product"]."',".$row["number"]."],";  
                          }  
						  ?>
        ]);

        var options = {
          title: 'My Daily Activities',
		  is3D:true,
		  pieHole: 0.4  
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
