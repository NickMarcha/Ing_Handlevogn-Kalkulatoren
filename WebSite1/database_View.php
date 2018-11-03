<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>HK/ViewDatabase</title>
    <link href="StyleSheet.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="nav-placeholder">
    </div>

	<p>Under konstruksjon</p>
    <script>
        $(function () {
            $("#nav-placeholder").load("https://raw.githubusercontent.com/h578011/Ing_Handlevogn-Kalkulatoren/master/WebSite1/nav.html");
        });
    </script>
    <footer>&copy; 2018 Damanito</footer>

</body>
</html>

<?php

/*Deprecated
$servername = "localhost";
$database = "handlevognkalkulator";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,"SELECT * FROM kiwiprices");
mysqli_close($conn);
*/
$file = "database.txt"

$barcode = 0
$productcompany = 1;
$producttype = 2;
$productname = 3;
$price = 4;

function readFileLine($file, $line)
{            
    return explode("\n", file_get_contents($file))[$line];
}
function getFileLineCount($file)
{            
    return count(explode("\n", file_get_contents($file));
}

echo "<table border='1'>
<tr>
<th>barcode</th>
<th>productcompany</th>
<th>producttype</th>
<th>productname</th>
<th>price</th>
</tr>";

for($i= 0; $i < getFileLineCount($file);  $i++ )
{
$row = readFileLine($file, $i);

echo "<tr>";
echo "<td>" . $row[$barcode] . "</td>";
echo "<td>" . $row[$productcompany] . "</td>";
echo "<td>" . $row[$producttype] . "</td>";
echo "<td>" . $row[$productname] . "</td>";
echo "<td>" . $row[$price] . "</td>";
echo "</tr>";

}

echo "</table>";



?>
