<?php
  require_once ('../models/database.php');
  require ('../models/adviser.php');

  function createAdviser ($identifier, $name, $lastName)
  {
    $advisersObjectArray = new Author ($identifier, $name, $lastName);
  }

  function readAdviser ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL SPGetAllAdvisers ();');
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

  function updateAdviser ()
  {

  }

  function deleteAdviser ()
  {

  }
?>
