<?php 

require 'config.php';

function connectDB() : mysqli {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASSWPORD, DB_NAME);

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}