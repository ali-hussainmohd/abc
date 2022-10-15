<?php 

function connection(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "kon_gaythan_db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
   // echo "Connected successfully";
    return $conn;
}

function hello(){
 echo 'hello you';
}

function courseslog(){

}


?>