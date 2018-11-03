<html>
<head>
    <meta charset="utf-8" />
    <title>HK/InputDatabase</title>
    <link href="StyleSheet.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="nav-placeholder">
    </div>
    <script>
        $(function () {
            $("#nav-placeholder").load("https://raw.githubusercontent.com/h578011/Ing_Handlevogn-Kalkulatoren/master/WebSite1/nav.html");
        });
    </script>
    <h1>Input</h1>
    <form method="POST" action="">
        <input placeholder="Hva er varens navn?" name="vareNavn" /> <br> <br>
        <input placeholder="Hva er varens strekkode?" name="vareStrekkode" /> <br> <br>
        <input type="number" step="0.01" placeholder="Hva er varens pris?" name="varePris" /> <br> <br>
        <input placeholder="Hvilket selskap produserer varen?" name="vareSelskap" /> <br> <br>
        <input placeholder="Hvilken type vare er varen?" name="vareType" /> <br> <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

<?php
    if (!isset($_POST["submit"]))
    {
        return;
    }

    $file = "database.txt";

    $barcode = 0;
    $productcompany = 1;
    $producttype = 2;
    $productname = 3;
    $price = 4;

    function appendFileLine($file, $line)
    {            
        $data = explode("\n", file_get_contents($file));
        array_push($data, $line);
        file_put_contents($file, implode("\n", $data));
    }

    appendFileLine($file, implode(",", 
        array(
            $_POST["vareStrekkode"], 
            $_POST["vareSelskap"], 
            $_POST["vareType"],
            $_POST["vareNavn"],
            $_POST["varePris"]
        )));


?>