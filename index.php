<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>p2</title>
    <meta charset='utf-8'>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <link href='/styles/style.css' rel='stylesheet'>

</head>
<body>
<div class='row'>
    <h1>Password Generator</h1>
    <div class='panel panel-default'>
        <form method='GET' action='generatePassword.php'>
            <div class='panel-body form-horizontal payment-form'>
                <fieldset>
                    <label class='col-sm-6 control-label'>Number of characters</label>
                    <div class='col-sm-3'>
                        <input class='form-control' type='number' name='numChars' value='<?= $numChars ?? '' ?>'>
                    </div>
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

                    <label class='col-sm-6 control-label'>Include a number</label>
                    <div class='col-sm-3'>
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
                Generated password is: <?= $password ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
</div>

</body>
</html>