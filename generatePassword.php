<?php

require 'Form.php';

use DWA\Form;

# Initiating the session
session_start();

# Instantiating the objects
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
    $charList = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    $password = "";
    $positionOfNumber = rand(0, $numChars - 1);
    $positionOfSpecialChar = rand(0, $numChars - 1);
    while ($positionOfNumber == $positionOfSpecialChar) {
        $positionOfSpecialChar = rand(0, $numChars - 1);
    }

    for ($index = 0; $index < $numChars; $index++) {
        if ($includeNumber and $index == $positionOfNumber) {
            $password = $password . rand(0, 9);
        } else if ($includeSpecialChar != 'choose' and $index == $positionOfSpecialChar) {
            $password = $password . $includeSpecialChar;
        } else {
            $password = $password . $charList[rand(0, 25)];
        }
    }
}
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'numChars' => $numChars,
    'includeNumber' => $includeNumber,
    'includeSpecialChar' => $includeSpecialChar,
    'password' => $password ?? null,
];

header('Location: index.php');