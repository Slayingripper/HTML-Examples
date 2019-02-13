<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
div.container {
    width: 100%;
}
header footer {
    clear: left;
    text-align: center;
}
h1{
	background-color: #666666;
	colour: white;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	font-size:105%;
}
li {
    float: left;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

body{
	background-image: url("wallpaper1.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;
}
.button {
  background-color: #666666;
  border: none;
  color: white;
  padding: 12px 24px;
  text-align: center;
  font-size: 14px;
  margin: 2px 1px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}

	</style>
	<head>

	<h1><center>Edit Artist</center></h1>

	</head>

	<body>

			<ul>
				<li><b><a href = "Home.php"> Home</b></a></li>
				<li><b><a href = "Artists.php"> Artists</b></a></li>
				<li><b><a href = "Albums.php"> Albums</b></a></li>
				<li><b><a href = "Tracks.php"> Tracks</b></a></li>
			</ul>
	</br>

	<?php
//	error_reporting(E_ALL);
//ini_set('display_errors', 1);
			include 'config.php';
			$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	//		if(mysqli_connect_errno())
	//	{
	//		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	//		die();
	//	}


		$artID = ($_GET['id']); // id of the current value identified
		$queryS = "SELECT artName FROM Artist WHERE artID = $artID"; // data based on that id selected through the query
		$result = mysqli_query($conn, $queryS);

		//this data is displayed through the loop
		foreach ($result as $newRow) {
		$CurrentArtistName = $newRow['artName'];
		}
		?>

	<form action="test.php?id=<?php echo $artID;?>" method = "POST">
		<b><font color = 'white'>Artist Name</font></b> <br></br>
		<input type = "text" name = "artistname" value = "<?php echo "$CurrentArtistName";?>">
		<input type="submit" name = "artForm" value="Save">
	</form>

	<?php
			//print_r($_POST);
			// the user inputs new data through the edit form
			//update query replaces the previous values with the new ones
			if(isset($_POST['artForm']))
		{
			$NewArtistName = $_POST['artistname'];
			$queryU = "UPDATE Artist SET artName = '$NewArtistName' WHERE artID = $artID;";
			//echo "$queryU";
			mysqli_query($conn, $queryU);
			header("Location:Artist.php");
		}

		mysqli_close($conn);
		?>

	</body>

			<a href = "Artists.php"><button class = "button"><b>Back to Artists</b></button></a>

</html>
