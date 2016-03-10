<?php
  require_once ('../models/database.php');
  require ('../models/project.php');

  function createProject ($name, $investigationLine, $calification, $addedDate, $adviserIdentifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $projectObject = new Project ($name, $investigationLine, $calification, $addedDate, $adviserIdentifier);

    $query = $connection->prepare
    (
      "CALL spSetProject
      (
        '$projectObject->getName ()', '$projectObject->getInvestigationLine ()', '$projectObject->getCalification ()', '$projectObject->getAddedDate ()',
        '$projectObject->getAdviserIdentifier ()'
      )"
    );
    
    $query->execute ();
    $result = $query->fetchAll ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function readProject ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllAuthors ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $authorsObjectArray = null;

    foreach ($result as $key => $value)
    {
      $authorsObjectArray [$i] = new Author ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $authorsObjectArray;
  }

  function updateAuthor ()
  {

  }

  function deleteAuthor ()
  {

  }
?>
