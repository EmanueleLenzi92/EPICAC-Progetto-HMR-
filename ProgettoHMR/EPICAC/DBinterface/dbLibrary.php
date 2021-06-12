<?php
// DbLibrary.php

/******************************
 * Open a Connection to MySQL *
 ******************************/
$db = mysqli_connect('localhost', 'root' , null, 'HMRepicac');
 
function openDB($database="HMRepicac", $password=null, $username="root", $servername="localhost"){
   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $database);
   if (!$conn) die("Connection failed: " . mysqli_connect_error($conn));
   mysqli_set_charset($conn, "utf8");
   return $conn;
}

/******************************
 * Lettura dei records        *
 ******************************/
function select($conn,$sql){
   // Esecuzione query
   $resultSet = mysqli_query($conn, $sql);
   if(!$resultSet) print("Errore esecuzione $sql:" . mysqli_error($conn));
	
   // Copio i records in un array associativo
   $records=array();   
   while ($record = mysqli_fetch_assoc($resultSet)) $records[]=$record;

   // Liberazione della memoria impegnata dal result set
   mysqli_free_result($resultSet);
   
   return $records;
}

/******************************
 * Close the Connection to MySQL *
 ******************************/
 function closeDB ($conn){
   mysqli_close($conn);
}


?>
