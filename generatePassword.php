<?php

require 'Password.php';
require 'Form.php';

use P2\Password;
use DWA\Form;

# Initiating the session
session_start();

# Instantiating the objects
$password = new Password();
$form = new Form($_GET);

# Getting data
$includeSpecialChar = $form->get('includeSpecialChar');
$includeNumber = $form->has('includeNumber');
$numChars = $form->get('numChars');

# Validating the data
$errors = $form->validate([
    'numChars' => 'required|digit|min:3|max:15',
    'includeSpecialChar' => 'required'
]);

if (!$form->hasErrors) {
    $password = $password->generateRandomPassword($numChars, $includeNumber, $includeSpecialChar);
}

# Storing results into session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'numChars' => $numChars,
    'includeNumber' => $includeNumber,
    'includeSpecialChar' => $includeSpecialChar,
    'password' => $password ?? null,
];

header('Location: index.php');