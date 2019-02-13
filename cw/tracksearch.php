
	
	<!DOCTYPE html>
<html>
<head>
<style>
div.container {
    width: 100%;
    border: 5px solid grey;
}
body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
padding: 0;
margin: 0;

}
table {
    table-layout: auto;
    align-items: center;
    width: 100%;
    border:1px solid;
    margin-top:20px;
    border-collapse: collapse;
    align-content: center;
    align-self: auto;
    
}
td {
    min-width: 150px;
    border:1px solid;
    align-content: center;
}
  table.center {
    margin-left:auto; 
    margin-right:auto;
   
  }
header, footer {
    padding: 1em;
    color: white;
    background-color: grey;;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 200px;
    margin: 3;
    padding: lem;
    font-family:Arial;
	 font-size: 20px
	 
	 
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 100px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: visible;
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body>

<div class="container">

<header>
   <h1>Database searcher</h1>
</header>
  
<nav>
  <ul>
    <li><a href="Home.php">Home</a></li>
    <li><a href="Artist.php">Artists</a></li>
    <li><a href="Album.php">Album</a></li>
    <li><a href="Tracks.php">Tracks</a></li>
  </ul>
</nav>

<article>
  <h1>Tracks</h1>
   <form>
  <form action="tracksearch.php" method="$GET">
  <input type="text" name="query" placeholder="Search..">
</form>
<?php 
    include 'config.php';
     $search_value=$_GET["query"];
    // Connect to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Check database connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
        die(); } 
        
    // Add a person
    if( isset($_GET['formSubmit']) )
    {     
        $name = $_GET['artID'];
        $phone = $_GET['artName'];
        $sql="INSERT INTO Artist(artID,artName) VALUES ('$artID', '$artName');";
        $result = mysqli_query($conn, $sql);      
    }

    // Delete a person
    if (isset($_GET['del']))
    {
       $del = $_GET['del'];       
       $sql="DELETE FROM Tracks WHERE trackID=$del;";
       $result = mysqli_query($conn, $sql);
    }
    
	// Display phone list
	
	$sql = "SELECT cdID,artID,trackID,trackname FROM `Tracks` WHERE (trackname LIKE'%".$search_value."%')";
    $result = mysqli_query($conn, $sql);
    $no_rows = mysqli_num_rows($result);
    
    if ($no_rows>0) { // if there is anything in the database
    	echo "<table>";  // start table
    	echo "<tr><th>cdID</th><th>artID</th><th>trackID</th><th>TrackName</th><th>Delete me</th></tr>"; // table header
    
    	foreach ($result as $row) // loop through result array
    	{
          $cdID = $row['cdID'];
          $artID = $row['artID'];
          $trackID = $row['trackID'];
          $trackname = $row['trackname'];
          
          echo "<tr>"; // output row
          
          // ID and Name
          echo "<td>$cdID</td>";
          echo "<td>$artID</td>";
           echo "<td>$trackID</td>";
          echo "<td>$trackname</td>";
          
          // Generate delete button
          $id = $row["artID"];
          
          // Delete button executes JavaScript confirmDelete function   	      	  
          echo "<td><button onclick=confirmDelete($id,'$artID')>Delete</button></td>"; 
          
          echo "</tr>";
    	}
    	
    	echo "</table>";
    	
    	echo "<p>$no_rows items</p>";
	} else // if zero rows returned
	{
	   echo "<p>Database empty</p>";
	}

    mysqli_close($conn);
  
  ?> 
 
</article>

<footer>The power of &copy; Vasilis Ieropoulos</footer>

</div>

</body>
</html>
