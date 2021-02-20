<?php

if (!session_id()) @session_start();
require_once('../../vendor/autoload.php');

flash()->message('This is a info message with TailwindCSS');

header('Location: msg.php');
