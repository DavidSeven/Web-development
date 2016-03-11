<?php
  require_once ('../models/database.php');
  require ('../models/project.php');

  function createProject ($name, $investigationLine, $calification, $addedDate, $adviserIdentifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $projectObject = new Project ("", $name, $investigationLine, $calification, $addedDate, "", $adviserIdentifier);
    $query = $connection->prepare
    (
      'CALL spSetProject
      (
        "'.$projectObject->getName ().'", "'.$projectObject->getInvestigationLine ().'", '.$projectObject->getCalification ().', "'.$projectObject->getAddedDate ().'",
        '.$projectObject->getAdviserIdentifier ().'
      )'
    );

    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function createIncludesRelation ($authorIdentifier, $projectIdentifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spSetIncludes ('.$authorIdentifier.', '.$projectIdentifier.')');
    $query->execute ();
    $query->closeCursor ();
    $query = $connection->prepare ('CALL spUpdateQuotaProject ('.$projectIdentifier.')');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function readProject ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllProjects ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $projectsObjectArray = null;

    foreach ($result as $key => $value)
    {
      $projectsObjectArray [$i] = new Project ($value ['identifier'], $value ['name'], $value ['investigationLine'], $value ['calification'], $value ['addedDate'], $value ['quota'], $value ['adviserIdentifier']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $projectsObjectArray;
  }

  function readSpecificProject ($name)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetProject ("'.$name.'")');
    $query->execute ();
    $result = $query->fetchAll ();
    $projectsObject = null;

    foreach ($result as $key => $value)
    {
      $projectsObject = new Project ($value ['identifier'], $value ['name'], $value ['investigationLine'], $value ['calification'], $value ['addedDate'], $value ['quota'], $value ['adviserIdentifier']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $projectsObject;
  }

  function updateProject ()
  {

  }

  function deleteProject ()
  {

  }
?>
