<?php 
$servername ="localhost";
$username ="root";
$pwd ="";
$dbname ="cruds";

$conn = mysqli_connect($servername,$username,$pwd,$dbname);

if (!$conn){
        echo "could not connect to";
} else{
    echo "connected";
}
?>