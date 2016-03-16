<?php
  require_once ('../models/database.php');
  require_once ('../models/investigationLine.php');

  function createInvestigationLine ($name)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $adviserObject = new investigationLine ("", $name);
    $query = $connection->prepare ('CALL spSetInvestigationLine ("'.$adviserObject->getName ().'")');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function readInvestigationLines ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllInvestigationLines ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $investigationLineObjectsArray = null;

    foreach ($result as $key => $value)
    {
      $investigationLineObjectsArray [$i] = new InvestigationLine ($value ['identifier'], $value ['name']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $investigationLineObjectsArray;
  }

  function readSpecificInvestigationLineByIdentifier ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetInvestigationLineByIdentifier ('.$identifier.')');
    $query->execute ();
    $result = $query->fetchAll ();
    $investigationLineObject = null;

    foreach ($result as $key => $value)
    {
      $investigationLineObject = new InvestigationLine ($identifier, $value ['name']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $investigationLineObject;
  }
?>
