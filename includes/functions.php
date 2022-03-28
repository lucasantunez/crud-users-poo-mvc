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

// Show msg
function showMessage($result) {

    $msg = '';

    switch($result) {
        case 1:
            $msg = 'Usuario guardado correctamente';
            break;
        case 2:
            $msg = 'Usuario actualizado correctamente';
            break;
        case 3:
            $msg = 'Usuario eliminado correctamente';
            break;
        default:
            $msg = false;
            break;
    }
    return $msg;
}