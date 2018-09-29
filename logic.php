<?php

session_start();

$hasErrors = false;

# Getting the results if available
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $numChars = $results['numChars'];
    $includeNumber = $results['includeNumber'];
    $includeSpecialChar = $results['includeSpecialChar'];
    $password = $results['password'];
    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

session_unset();