<?php

use function Tamtamchik\SimpleFlash\flash;

include_once '_init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test UiKit template example.</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.23.13/css/uikit.min.css"
          integrity="sha512-giAxX2Dm0fHfTxCGThgfHXfyqC+NAsPAMI39ZDfs70vsKGALMfsNEbxlq6rZxPWWjH685ehdfvTQJkAWEgxOPw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>

<?php include_once '_ribbon.php'; ?>

<div class="uk-container" style="width: 600px;">

    <?php include_once '_menu.php'; ?>

    <?= flash()->displayUiKit() ?>

</div>

</body>
</html>
