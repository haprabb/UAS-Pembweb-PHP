<?php


function getConnection()
{
    $host = 'localhost';
    $dbname = 'uas_pemweb';
    $username = 'root';
    $password = '';

    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
