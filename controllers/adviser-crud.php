<?php
  require_once ('../models/database.php');
  require ('../models/adviser.php');

  function readAdviser ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllAdvisers ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $advisersObjectArray = null;

    foreach ($result as $key => $value)
    {
      $advisersObjectArray [$i] = new Author ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $advisersObjectArray;
  }
?>
