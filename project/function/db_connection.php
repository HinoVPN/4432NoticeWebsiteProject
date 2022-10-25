<?php
    date_default_timezone_set('Asia/Hong_Kong');
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "admin";
        $dbpass = "adminpass";
        $db = "project";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }
   
?>