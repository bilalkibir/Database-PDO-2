<?php

function get_db_connection()
{
    $servername = "localhost";
    $username = "bit_academy";
    $password = "Jarvis123@";
    return new PDO("mysql:host=$servername;dbname=netland", $username, $password);
}
