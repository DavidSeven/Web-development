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

  function readSpecificAdviserByIdentifier ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAdviserByIdentifier ('.$identifier.')');
    $query->execute ();
    $result = $query->fetchAll ();
    $advisersObject = null;

    foreach ($result as $key => $value)
    {
      $advisersObject = new Adviser ($identifier, $value ['name'], $value ['lastName']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $advisersObject;
  }
?>
