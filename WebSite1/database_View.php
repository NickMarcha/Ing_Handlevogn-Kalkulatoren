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

echo "<table border='1'>
<tr>
<th>barcode</th>
<th>productcompany</th>
<th>producttype</th>
<th>productname</th>
<th>price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['barcode'] . "</td>";
echo "<td>" . $row['productcompany'] . "</td>";
echo "<td>" . $row['producttype'] . "</td>";
echo "<td>" . $row['productname'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
