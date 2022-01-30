<?php 
require("inc/db.inc.php"); 
require("inc/functions.inc.php");

$isFormSubmitted = ( 
  !empty($_POST['name']) && 
  !empty($_POST['email']) && 
  !empty($_POST['phone']) && 
  !empty($_POST['message']) 
);


if($isFormSubmitted)
{
  $stmt = $pdo->prepare("INSERT INTO `messages` 
        (`name`, `email`, `phone`, `message`) 
        VALUE(:name, :email, :phone, :message) ");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $stmt->bindParam(":name", $name, PDO::PARAM_STR);
  $stmt->bindParam(":email", $email, PDO::PARAM_STR);
  $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
  $stmt->bindParam(":message", $message, PDO::PARAM_STR);

  $stmt->execute();
}

header("Location: index.php?contact=success#section-contact");
die();