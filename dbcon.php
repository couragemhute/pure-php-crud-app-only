<?php

// connecting to mySQl database   root is username and "" for no password
$con =mysqli_connect("localhost","root","","blog" );
if(!$con){
    die('Connection to mySQl database is not established'.mysqli_connect_error());
}

?>