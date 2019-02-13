

<html>

<head>
<title>A pretty phone list</title>

<style>
table, td {
padding: 0.3rem;
border: 1px solid black;
    border-collapse: collapse;
    text-align: left;
    background-color: #FFB74C;
    color: #451ECC;
    font-family: Arial, Helvetica, sans-serif;}

th {
    padding: 0.4rem;
    background-color: #CC6E1E;
    color: #FFB74C; }
    
h1 {
    font-family: Arial, Helvetica, sans-serif;
    color: #451ECC; }
    
h2 {
    font-family: Arial, Helvetica, sans-serif;
    color: #451ECC; }
        
p, form {
          font-family: Arial, Helvetica, sans-serif;
          color: #451ECC }

input[type=text] {
    padding:5px; 
    border:2px solid #ccc; 
    -webkit-border-radius: 5px;
    border-radius: 5px;
    font-family: Arial, Helvetica, sans-serif;
}


input[type=submit] {
    padding:5px 15px; 
    border:0 none;
    background:#FF0000); 
    border-radius: 10px; 
}
          
</style>

<script>

    // A JavaScript function to confirm delete
    function confirmDelete(ID,name)
    {
        var conf = confirm("Are you sure you want to delete "+name+"?");
        if (conf == true) // if OK pressed
        {
            delParam="?del="+ID; // add del parameter to URL
            this.document.location.href=delParam; // reload document
        }
    }
</script> 
            
            
</head>

<body>

<h1>Database demo #7</h1>
<h2>Pretty interactive phone list - using tables, CSS and JavaScript</h2>

  <form id="phonelist" action="php-demo25.php" method="GET">
    Name:  <input type="text" name="name"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" name="formSubmit" value = "Add Record">
  </form>
  <hr>
  


  <?php 
    include 'config.php';
      
    // Connect to database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Check database connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
        die(); } 
        
    // Add a person
    if( isset($_GET['formSubmit']) )
    {     
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $sql="INSERT INTO person(personName, personPhone) VALUES ('$name', '$phone');";
        $result = mysqli_query($conn, $sql);      
    }

    // Delete a person
    if (isset($_GET['del']))
    {
       $del = $_GET['del'];       
       $sql="DELETE FROM person WHERE personID=$del;";
       $result = mysqli_query($conn, $sql);
    }
    
	// Display phone list
	$sql = "SELECT * FROM person ORDER BY personName";
    $result = mysqli_query($conn, $sql);
    $no_rows = mysqli_num_rows($result);
    
    if ($no_rows>0) { // if there is anything in the database
    	echo "<table>";  // start table
    	echo "<tr><th>Name</th><th>Phone</th><th></th></tr>"; // table header
    
    	foreach ($result as $row) // loop through result array
    	{
          $name = $row['personName'];
          $phone = $row['personPhone'];
          
          echo "<tr>"; // output row
          
          // name and phone
          echo "<td>$name</td>";
          echo "<td>$phone</td>";
          
          // Generate delete button
          $id = $row["personID"];
          
          // Delete button executes JavaScript confirmDelete function   	      	  
          echo "<td><button onclick=confirmDelete($id,'$name')>Delete</button></td>"; 
          
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

 <hr>

</body>
</html>

Execute demonstration
