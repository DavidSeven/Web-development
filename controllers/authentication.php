<?php
  require_once ('user-crud.php');

  session_start ();
  $nickname = $_POST ['user'];
  $password = $_POST ['password'];

  $userObject = readSpecificUserByNickname ($nickname);
  $jsonData = null;

  if ($userObject != null && verifyUserPassword ($password, $userObject->getPassword ()))
  {
    $_SESSION ['user-online']['nickname'] = $userObject->getNickname ();
    $_SESSION ['user-online']['type'] = $userObject->getType ();
    $jsonData = array ('isConnect' => true);
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
