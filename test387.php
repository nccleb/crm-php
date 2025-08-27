



<?php
$idf=$_GET['var3'];
 $z=$_GET['var4'];




?>


<html>


  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  



 


       






    <script>

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      
   
     
      function drawChart() {
        <?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
 $idf=$_GET['var3'];
 $z=$_GET['var4'];
     
    if( $z=="q"){

      $startdate=$_GET['var1'];
      $enddate=$_GET['var2'];
    //$idf=$_POST['name'];
   $req86=mysqli_query($idr,"select incident , count(*) AS counter FROM crm 
   where  lcd between \"$startdate\" and\"$enddate\" 
   
   
   
   AND incident IN ( select comment_text  FROM comments )
    
   
  
  

  
    
   GROUP BY incident

   ");
    }

    
    elseif( $z=="!"){
        $startdate=$_GET['var1'];
       $enddate=$_GET['var2'];
   
       $req86=mysqli_query($idr,"select incident, name , count(*) AS counter FROM crm c, form_element f
       where c.idfc = f.idf
       AND lcd between \"$startdate\" and\"$enddate\" 
        AND name= '$idf'	
       AND incident IN ( select comment_text  FROM comments )
        
       
      
      
    
      
        
       GROUP BY incident
    
       ");
  
     





    }
 
?>


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        //data.addRows([
            <?php 


//$data = "var data = new google.visualization.DataTable();\n\r"
//."data.addColumn('string', 'CO2');\n\r"
//."data.addColumn('number', 'Temperature');\n\r\n\r"
echo "data.addRows([\n\r";

while($row = mysqli_fetch_assoc($req86)) {  
  
       $temp = $row['incident'];
       $co2 = $row['counter'];
       echo "  ["."'". $row['incident']."'".", ". $row['counter']."],\n\r";
       }
      echo "]);\n\r";
    
?>

   
   

        // Set chart options
        var options = {'title':'Complaints statistics',
                       'width':800,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    
    
    <!--Div that will hold the pie chart-->
   <div id="chart_div"></div>
  </body>
</html>

































	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
























