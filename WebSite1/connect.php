<?php
// Create connection
	$vareNavnInput = filter_input(INPUT_POST,'vareNavn');
	$vareStrekkodeInput = filter_input(INPUT_POST,'vareStrekkode');
	$varePrisInput = filter_input(INPUT_POST,'varePris');
	
	if(!empty($vareNavnInput) &&!empty($vareStrekkodeInput)&& !empty($varePrisInput)) {
		$servername = "localhost";
$database = "handlevognkalkulator";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
		
		if (mysqli_connect_error()){
		  die('Connect Error ('. mysqli_connect_errno() .') '
			. mysqli_connect_error());
		}
		else{
		  $sql = "INSERT INTO kiwiprices (productname, barcode,price)
		  values ('$vareNavnInput','$vareStrekkodeInput', '$varePrisInput')";
		  if ($conn->query($sql)){
			echo "New record is inserted sucessfully";

		header('Location: database_View.php');
		  }
		  else{
			echo "Error: ". $sql ."
		". $conn->error;

		header('Location: database_input.php');
		  }
		  $conn->close();
		}
	} else {
		echo "everything should be filled in";
		header('Location: index.html');
	}
		
		
	/*
	$conn = mysqli_connect($servername, $username, $password, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	 
	echo "Connected successfully";
	
	if(isset($_POST["submit"])){
		$vareNavnInput = $_POST['vareNavn'];
		$vareStrekkodeInput = $_POST['vareStrekkode'];
		$varePrisInput = $_POST['varePris'];
	

		if($query = mysqli_query($conn,"INSERT INTO kiwiprices ('id', 'username', 'password', 'email') VALUES('', '".$username."', '".$password."', '".$email."')")){
			echo "Success";
			header('database_View.php'); 
		}else{
			echo "Failure" . mysqli_error($conn);
			header('index.html');
		}

    }
	*/
?>



