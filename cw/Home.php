<!DOCTYPE html>
<html>
<head>

<style>
div.container {
    width: 100%;
    border: 1px solid grey;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #f2f2f2;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #f2f2f2;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
padding: 0;
margin: 0;

}
table {
    table-layout: auto;
    width: 100%;
    border:1px solid;
    margin-top:20px;
    border-collapse: collapse;
    align-content: center;
}
td {
    min-width: 250px;
    border:1px solid;
    align-content: center;
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
  <h1>Data-base Metrics</h1>
 
  <?php include 'nana.php'; ?>
   <p> 
   
   </p>
    <?php include 'nana2.php'; ?>
 </p>
    <?php include 'nana3.php'; ?>
<!-- Trigger/Open The Modal -->
<p>
<button id="myBtn">THE MAGICAL BUTTON</button>
 </p>
</article>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>MAGIC</h2>
    </div>
    <div class="modal-body">
<img src="https://media.giphy.com/media/l4JySutM0h82AcE12/giphy.gif" alt="Sexy">      <p>FAncy pop ups</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<footer> THE POWER OF &copy; Vasilis Ieropoulos</footer>

</div>

</body>
</html>
