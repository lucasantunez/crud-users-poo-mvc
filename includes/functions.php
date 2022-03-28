<?php

define('FUNCTIONS_URL', __DIR__ . 'funciones.php');

function debugger($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Clean html
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Validate id in GET
function validateOrRedirect(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: ${url}");
    }
    return $id;
}
