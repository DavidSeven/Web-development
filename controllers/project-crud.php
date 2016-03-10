<?php
  require_once ('../models/database.php');
  require ('../models/project.php');

  $databaseObject = new Database ();
  $databaseObject->connect ();

  function create ($name, $investigationLine, $calification, $addedDate)
  {
    $projectObject = new Project ($name, $investigationLine, $calification, $addedDate);
  }

  function read ()
  {
    $query->$databaseObject->prepare ('CALL spGetAllProjects ()');
    $query->execute ();
    $result->fetchAll ();
    $i = 0;

    foreach ($result as $key => $value)
    {
      $projectsObjectArray [$i] = new Project ($value ['identifier'], $value ['name'], $value ['investigationLine'], $value ['calification'], $value ['addedDate'], $value ['quota']);
      $i ++;
    }

    return $projectsObjectArray;
  }

  function update ()
  {

  }

  function delete ()
  {

  }
?>
