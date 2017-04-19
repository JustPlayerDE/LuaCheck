<?php
session_start();
require('sys/functions.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>LuaCheck</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#UltimateNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LuaCheck</a>
    </div>
    <div class="collapse navbar-collapse" id="UltimateNav">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">Home</a></li>
         </ul>
      
      <ul class="nav navbar-nav navbar-right">
        </ul>

    </div>
  </div>
</nav>

  
<div class="container" style="width:80%;">
<?
if (!empty($Errors))
    foreach ($Errors as $error):
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . converttext($error) . '</div>';
    endforeach;
if (!empty($Successes))
    foreach ($Successes as $success):
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . converttext($success) . '</div>';
    endforeach;
?>
<noscript><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?
echo $lang["no_javascript"];
?></div></noscript>

<?

    include("include/" . maininclude());

?>
 
  
          <div class="pull-right">
            <br>LuaCheck by <a href="https://justplayer.de" target="_blank">JustPlayerDE</a>
        </div>
  </div>

</body>
</html>