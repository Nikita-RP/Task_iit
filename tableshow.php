<?php
include 'db.php';
//conenct to local mysql database
$conn3=new mysqli($servername,$username,$pass,$db3name);

// Create database using PHP
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

//Create a table using PHP
// $sql = "CREATE TABLE weather (
// Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// Temp INT(6),
// Rain INT(6),
// Pressure INT(6),
// Wind Speed INT(6),
// Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// if ($conn->query($sql) === TRUE) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

$query = "SELECT * FROM jaipur";
echo '<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<style>
table, th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
th {
  background-color: #96D4D4;
}
td:hover {background-color: coral;}

</style>
<body>';

//show Table of data
echo "<h1>Table</h1>";


$Rainfall = array();
$Temp  = array();
$Wind = array();
//$Humidity = array();
$Pressure = array();
$Date = array();
$Time = array();
if ($result = $conn3->query($query)) {
    echo '<table style="width:100%"><tr><th>Date</th> <th>Time</th>  <th>Rainfall</th> <th>Temperature</th>  <th>Pressure</th> <th>Wind Speed</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $field0name = $row["Date"];
		$field1name = $row["Time"];
        $field2name = $row["Rainfall"];
        $field3name =  $row["Temperature"];
       // $field4name = $row["Humidity"];
        $field5name = $row["pressure"];
        $field6name = $row["Wind speed"];
        $Rain[]= $row["Rainfall"];
        $Temp[]  = $row["Temperature"];
      //  $Humidity[] = $row["Humidity"];
        $Pressure[] =  $row["pressure"];
        $Wind[] =  $row["Wind speed"];
        $time = strtotime($row["Time"]);
        $Date[] =  '"' . date("m/d/y g:i A", $time) . '"';
        echo '<tr><td>'.$field0name.'</td>';
		echo '<td>'.$field1name.'</td>';
        echo '<td>'.$field2name.'</td>';
        echo '<td>'.$field3name.'</td>';
      //  echo '<td>'.$field4name.'</td>';
        echo '<td>'.$field5name.'</td>';
        echo '<td>'.$field6name.'</td></tr>';
    }
    echo '</table>';
    //table completed

    //Show Graph
    echo '
    <h1>Graphs</h1>
    <table>
    <tr><td><div id="Rainfall" style="width:100%;max-width:700px"></div></td>
    <td><div id="Temp" style="width:100%;max-width:700px"></div></td></tr>
     <tr><td><div id="Pressure" style="width:100%;max-width:700px"></div></td>
    <td><div id="Wind" style="width:100%;max-width:700px"></div></td>
    </tr>
    </table>
    <script>
    //data variables defined here
    var xAxis = ['.implode(",",$Date).'];
    var yRainfall = ['.implode(",",$Rainfall).'];
    var yTemp = ['.implode(",",$Temp).'];
    var yPressure = ['.implode(",",$Pressure).'];
    var yWind = ['.implode(",",$Wind).'];
    // Define Data
    var Rainfalldata = [{
    x: xAxis,
    y: yRainfall,
    mode: "lines" 
    }];
    var Tempdata = [{
    x: xAxis,
    y: yTemp,
    mode: "lines" 
    }];
    var Pressuredata = [{
    x: xAxis,
    y: yPressure,
    mode: "lines" 
    }];
    var Winddata = [{
    x: xAxis,
    y: yWind,
    mode: "lines" 
    }];
    

    // Define Layout
    var Rainfall = {
    xaxis: { title: "Time"},
    yaxis: { title: "Rainfall"}, 
    title: "Rainfall vs. Time"
    };
    var Temp = {
    xaxis: { title: "Time"},
    yaxis: { title: "Temprature"}, 
    title: "Temprature vs. Time"
    };
    var Wind = {
    xaxis: { title: "Time"},
    yaxis: { title: "Wind"}, 
    title: "Wind vs. Time"
    };
    var Pressure = {
    xaxis: { title: "Time"},
    yaxis: { title: "Pressure"}, 
    title: "Pressure vs. Time"
    };
    
    // Display using Plotly
    Plotly.newPlot("Rainfall", Rainfalldata, Rainfall);
    Plotly.newPlot("Temp", Tempdata, Temp);
    Plotly.newPlot("Pressure", Pressuredata, Pressure);
    Plotly.newPlot("Wind", Winddata, Wind);
  
    </script>';
    //Graph completed

echo '</body></html>';
$result->free();
}?>