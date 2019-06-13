<?php
    function connect(){
        $database_name = "la_conquistada";
        $username = "root";
        $password = "";
        $server = "localhost";

        $link = mysqli_connect($server, $username, $password, $database_name);

        
        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        }

        return $link;
    }
?>