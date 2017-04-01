#! /usr/bin/php
#Author: Debdeep Dey
#Automate script to convert data to json
<?php
    //open connection to mysql db
$servername = "localhost";
$username = "root";
$password = "password";
$database = "temp_database";
    $connection = mysqli_connect($servername,$username,$password,$database) or die("Error " . mysqli_error($connection));
    $sql = "select * from tempLog";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {	
        $emparray[] = $row;
	
    }

    $fp = fopen('userdata.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
    
    echo "Converted Successfully";
     mysqli_close($connection);
?>
