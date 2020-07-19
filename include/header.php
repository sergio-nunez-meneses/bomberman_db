<?php
require_once dirname(dirname(__FILE__)) . '/controllers/functions.php';
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sergio Núñez Meneses">
    <link rel="stylesheet" href=" <?php echo '/' . basename(dirname(dirname(__FILE__))) . '/public/css/style.css'; ?> ">
    <title>bomberman&#94;2</title>
  </head>
  <body>

    <header class="header-container">
      <h3 class="title">bomberMath.pow(this, 2)</h3>
    </header>
