<?php
session_start();

require_once 'vendor/autoload.php';

flash()->error('Error message!')->warning('Warning message.')->info('Info message.')->success('Success message!');
$messages = flash();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

<br/>

<div class="container" style="width: 600px;">
  <?= $messages ?>
</div>

</body>
</html>
