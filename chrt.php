<?php
//conenct to local mysql database
//$conn = mysqli_connect('localhost', 'root', '','myDB');
include 'db.php';
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
// Light INT(6),
// Forcee INT(6),
// Datee TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";
// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

//Insert data to weather table  in myDB database 
// $sql = "INSERT INTO weather (Temp, Rain, Light, Forcee)
// VALUES (1324, 515, 767 , 43)";
// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$query = "SELECT * FROM weather";
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
$Pressure = array();
$Date = array();
if ($result = $conn->query($query)) {
    echo '<table style="width:100%"><tr><th>Date & Time</th>  <th>Rainfall</th> <th>Temperature</th> <th>Light</th> <th>Pressure</th></tr>';
    while ($row = $result->fetch_assoc()) {
        $field0name = $row["Time"];
        $field2name = $row["rainfall"];
        $field3name =  $row["temp"];
        $field4name = $row["wind speed"];
        $field5name = $row["pressure"];
        $Rainfall[] =  $row["rainfall"];
        $Temp[]  = $row["temp"];
        $Wind[] = $row["wind speed"];
        $Force[] =  $row["pressure"];
        $time = strtotime($row["Time"]);
        $Date[] =  '"' . date("m/d/y g:i A", $time) . '"';
        echo '<tr><td>'.$field0name.'</td>';
        echo '<td>'.$field2name.'</td>';
        echo '<td>'.$field3name.'</td>';
        echo '<td>'.$field4name.'</td>';
        echo '<td>'.$field5name.'</td></tr>';
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
    <td><div id="Wind" style="width:100%;max-width:700px"></div></td></tr>
    </table>
    <script>
    //data variables defined here
    var xAxis = ['.implode(",",$Date).'];
    var yRain = ['.implode(",",$Rainfall).'];
    var yTemp = ['.implode(",",$Temp).'];
    var yPressure = ['.implode(",",$Pressure).'];
    var yWind = ['.implode(",",$Wind).'];

    // Define Data
    var Rainfalldata = [{
    x: xAxis,
    y: yRain,
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
    yaxis: { title: "Wind speed"}, 
    title: "Wind Sped vs. Time"
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