 <?php 

    include 'config.php';
      
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
        die(); } 

	$sql = "SELECT * FROM CD";
    $result = mysqli_query($conn, $sql);
    $no_rows = mysqli_num_rows($result);
   

    
    echo "Number of Albums $no_rows";

    mysqli_close($conn);
  
  ?> 