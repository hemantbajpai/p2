<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Random Password Generator</title>
    <meta charset='utf-8'>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <link href='/styles/style.css' rel='stylesheet'>

</head>
<body>
<div class='row'>
    <h1>Random Password Generator</h1>
    <p>This website generates a random password based on your input.</p>
    <p>You need to specify length of the password and whether you want to use number and/or special character.</p>
    <div class='panel panel-default'>
        <div class='panel-body form-horizontal payment-form'>
            <form method='GET' action='generatePassword.php'>

                <fieldset>
                    <div class='field'>
                        <label class='col-sm-6 control-label'>Length of password (more than 2)</label>
                        <div class='col-sm-3'>
                            <input class='form-control'
                                   type='number'
                                   name='lengthOfPassword'
                                   value='<?= $lengthOfPassword ?? '' ?>'>
                        </div>
                    </div>
                    <div class='field'>
                        <label class='col-sm-6 control-label'>Include a special character</label>
                        <div class='col-sm-3'>
                            <select class='form-control' name='includeSpecialChar'>
                                <option value='choose'>Choose one...</option>
                                <option value='~' <?php if (isset($includeNumber) and $includeSpecialChar == '~') echo 'selected' ?>>~</option>
                                <option value='!' <?php if (isset($includeNumber) and $includeSpecialChar == '!') echo 'selected' ?>>!</option>
                                <option value='@' <?php if (isset($includeNumber) and $includeSpecialChar == '@') echo 'selected' ?>>@</option>
                                <option value='#' <?php if (isset($includeNumber) and $includeSpecialChar == '#') echo 'selected' ?>>#</option>
                                <option value='$' <?php if (isset($includeNumber) and $includeSpecialChar == '$') echo 'selected' ?>>$</option>
                                <option value='%' <?php if (isset($includeNumber) and $includeSpecialChar == '%') echo 'selected' ?>>%</option>
                                <option value='^' <?php if (isset($includeNumber) and $includeSpecialChar == '^') echo 'selected' ?>>^</option>
                                <option value='&' <?php if (isset($includeNumber) and $includeSpecialChar == '&') echo 'selected' ?>>&</option>
                                <option value='*' <?php if (isset($includeNumber) and $includeSpecialChar == '*') echo 'selected' ?>>*</option>
                            </select>
                        </div>
                    </div>

                    <label class='col-sm-6 control-label'>Include a number</label>
                    <div class='col-sm-1'>
                        <input class='form-control' type='checkbox'
                               name='includeNumber' <?php if (isset($includeNumber) and $includeNumber) echo 'checked' ?> >
                    </div>
                </fieldset>
                <input type='submit' value='Generate password' class='btn btn-primary formButton'>
            </form>

            <?php if ($hasErrors): ?>
                <div class='error'>
                    <?php foreach ($errors as $error): ?>
                        <?= $error ?>
                    <?php endforeach; ?>
                </div>
            <?php endif ?>
            <?php if (!$hasErrors): ?>
                <?php if (isset($password)): ?>
                    <div class='output'>
                        Generated password is: <?= $password ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>