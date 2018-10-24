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
    <form method="POST" action="connect.php">
        <input placeholder="Hva er varens navn?" name="vareNavn" /> <br> <br>
        <input placeholder="Hva er varens strekkode?" name="vareStrekkode" /> <br> <br>
        <input placeholder="Hva er varens pris?" name="varePris" /> <br> <br>
        <input type="submit" value="Submit">Klikk her for å skrive til database</input>
    </form>
</body>
</html>
