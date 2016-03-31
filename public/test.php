<?php
  require_once ('../models/bcrypt.php');
require_once ('../models/database.php');

  $user = 'davidweb3';
  $password = 'masterkey3';// $_POST ['password'];
  $type = 3;
  $bcrypt = new Bcrypt (15);
  $hash = $bcrypt->hash ($password);
  $databaseObject = new Database ();
  $connection = $databaseObject->connect ();
  $query = $connection->prepare ('CALL spSetUser ("'.$user.'", "'.$hash.'", '.$type.')');
  $query->execute ();
  $query->closeCursor ();
  $connection = null;
  $databaseObject = null;
  $databaseObject = new Database ();
  $connection = $databaseObject->connect ();
  $query = $connection->prepare ('CALL spGetUserByNickname ("'.$user.'")');
  $query->execute ();
  $result = $query->fetchAll ();
  $us = null;
  $passwd = null;

  foreach ($result as $key => $value)
  {
    $type = $value ['type'];
    $passwd = $value ['password'];
  }

  $query->closeCursor ();
  $connection = null;
  $databaseObject = null;

  echo 'usuario ingresado: '.$user.'<br> clave ingresada: '.$password.'<br> tipo retornado: '.$type.'<br> hash ingresado: '.$hash.'<br> hash retornado: '.$passwd.'<br>';

  if ($bcrypt->verify ($password, $passwd))
  {
    echo '¡verificado!';
  }
  else
  {
    echo 'no valido';
  }

  $bcrypt = new Bcrypt (15);

  if ($bcrypt->verify ($password, $passwd))
  {
    echo '¡verificado 2!';
  }
  else
  {
    echo 'no valido 2';
  }
?>
