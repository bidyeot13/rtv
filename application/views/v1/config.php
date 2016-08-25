<?php  
$servername = "localhost";
$username = "autorent_fbapps";
$password = "tlAa+DCKKPd{";
$dbname = "autorent_fbapps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rands = rand(1, 7);

$sql = "SELECT a,b,c,d,e,f FROM number WHERE id = $rands";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " - Name: " . $row["text"]. " " . $row["user"]. "<br>";
	   
	   $a= $row["a"];
	    $b= $row["b"];
	    $c= $row["c"];
	    $d= $row["d"];
	    $e= $row["e"];
	    $f= $row["f"];
    }
} else {
    echo "0 results";
}
$conn->close(); 
?> 