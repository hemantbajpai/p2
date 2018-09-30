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
$lengthOfPassword = $form->get('lengthOfPassword');

# Validating the data
$errors = $form->validate([
    'lengthOfPassword' => 'required|digit',
    'includeSpecialChar' => 'required'
]);

if (!$form->hasErrors) {
    $password = $password->generateRandomPassword($lengthOfPassword, $includeNumber, $includeSpecialChar);
}

# Storing results into session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'lengthOfPassword' => $lengthOfPassword,
    'includeNumber' => $includeNumber,
    'includeSpecialChar' => $includeSpecialChar,
    'password' => $password ?? null,
];

header('Location: index.php');