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

  function updateProject ()
  {

  }

  function deleteProject ()
  {

  }
?>
