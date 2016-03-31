<?php
  require_once ('../models/database.php');
  require_once ('../models/user.php');
  require_once ('../models/bcrypt.php');

  function readSpecificUserByNickname ($nickname)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetUserByNickname ("'.$nickname.'")');
    $query->execute ();
    $result = $query->fetchAll ();
    $userObject = null;

    foreach ($result as $key => $value)
    {
      $userObject = new User (null, $nickname, $value ['password'], $value ['type']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $userObject;
  }

  function verifyUserPassword ($password, $hash)
  {
    $bcrypt = new Bcrypt (15);
    return $bcrypt->verify ($password, $hash);
  }
?>
