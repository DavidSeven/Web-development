<?php
  require_once ('../models/database.php');
  require_once ('../models/project.php');
  require_once ('adviser-crud.php');
  require_once ('investigation-line-crud.php');

  function createProject ($name, $calification, $addedDate, $adviserIdentifier, $investigationLine)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $projectObject = new Project ("", $name, $calification, $addedDate, "", $adviserIdentifier, $investigationLine);

    $query = $connection->prepare
    (
      'CALL spSetProject
      (
        "'.$projectObject->getName ().'", '.$projectObject->getCalification ().', "'.$projectObject->getAddedDate ().'",
        '.$projectObject->getAdviserIdentifier ().', '.$projectObject->getInvestigationLineIdentifier ().'
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

  function readProjects ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllProjects ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $data = array ();
    $projectObjectsArray = null;
    $adviserNamesArray = null;
    $investigationLineNamesArray = null;

    foreach ($result as $key => $value)
    {
      $projectObjectsArray [$i] = new Project ($value ['identifier'], $value ['name'], $value ['calification'], $value ['addedDate'], $value ['quota'], $value ['adviserIdentifier'], $value ['investigationLineIdentifier']);
      $adviserNamesArray [$i] = readSpecificAdviserByIdentifier ($projectObjectsArray [$i]->getAdviserIdentifier ());
      $investigationLineNamesArray [$i] = readSpecificInvestigationLineByIdentifier ($projectObjectsArray [$i]->getInvestigationLineIdentifier ());
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    $data ['projects'] = $projectObjectsArray;
    $data ['advisers'] = $adviserNamesArray;
    $data ['investigationLines'] = $investigationLineNamesArray;
    return $data;
  }

  function readSpecificProject ($name)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetProjectByName ("'.$name.'")');
    $query->execute ();
    $result = $query->fetchAll ();
    $projectObject = null;

    foreach ($result as $key => $value)
    {
      $projectObject = new Project ($value ['identifier'], $name, $value ['calification'], $value ['addedDate'], $value ['quota'], $value ['adviserIdentifier'], $value ['investigationLineIdentifier']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $projectObject;
  }

  function readSimilarProjects ($sql)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ($sql);
    $query->execute ();
    $result = $query->fetchAll ();
    $projectObjectsArray = null;
    $i = 0;

    foreach ($result as $key => $value)
    {
      $projectObjectsArray [$i] = new Project ($value ['identifier'], $value ['name'], $value ['calification'], $value ['addedDate'], $value ['quota'], $value ['adviserIdentifier'], $value ['investigationLineName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $projectObjectsArray;
  }

  function readAllIncludesRelation ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllIncludes ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $includesArray = null;
    $i = 0;

    foreach ($result as $key => $value)
    {
      $includesArray [$i] = array ($value ['authorIdentifier'], $value ['projectIdentifier']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $includesArray;
  }

  function updateProject ($identifier, $name, $calification, $addedDate, $adviserIdentifier, $investigationLine)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $projectObject = new Project ($identifier, $name, $calification, $addedDate, 3, $adviserIdentifier, $investigationLine);

    $query = $connection->prepare
    (
      'CALL spUpdateProject
      (
        '.$projectObject->getIdentifier ().', "'.$projectObject->getName ().'", '.$projectObject->getCalification ().', "'.$projectObject->getAddedDate ().'",
        '.$projectObject->getQuota ().', '.$projectObject->getAdviserIdentifier ().', '.$projectObject->getInvestigationLineIdentifier ().'
      )'
    );

    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function deleteIncludesRelation ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spDeleteIncludes ('.$identifier.')');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function readProjectIdentifierByAuthorIdentifier ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetProjectIdentifierByAuthorIdentifier ('.$identifier.')');
    $query->execute ();
    $result = $query->fetchAll ();
    $projectIdentifier = null;

    foreach ($result as $key => $value)
    {
      $projectIdentifier = $value ['projectIdentifier'];
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $projectIdentifier;
  }

  function deleteProject ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spDeleteProject ('.$identifier.')');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

  function increaseProjectQuota ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spIncreaseProjectQuota ('.$identifier.')');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }
?>
