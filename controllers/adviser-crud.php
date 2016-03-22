<?php
  require_once ('../models/database.php');
  require_once ('../models/adviser.php');

  function createAdviser ($name, $lastName)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $adviserObject = new Adviser ("", $name, $lastName);
    $query = $connection->prepare ('CALL spSetAdviser ("'.$adviserObject->getName ().'", "'.$adviserObject->getLastName ().'")');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function readAdvisers ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllAdvisers ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $adviserObjectsArray = null;

    foreach ($result as $key => $value)
    {
      $adviserObjectsArray [$i] = new Adviser ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $adviserObjectsArray;
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

  function readSimilarAdvisers ($sql)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ($sql);
    $query->execute ();
    $result = $query->fetchAll ();
    $adviserObjectsArray = null;
    $i = 0;

    foreach ($result as $key => $value)
    {
      $adviserObjectsArray [$i] = new Adviser ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $adviserObjectsArray;
  }
?>
