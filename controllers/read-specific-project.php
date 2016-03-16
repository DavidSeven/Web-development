<?php
  require_once ('project-crud.php');
  require_once ('adviser-crud.php');
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $investigationLine = $_POST ['investigationLine'];
  $calification = $_POST ['calification'];
  $addedDate = $_POST ['addedDate'];
  $quota = $_POST ['quota'];
  $adviserName = $_POST ['adviser-name'];

  $sql = 'select project.identifier, project.name, investigationLine.name as investigationLineName, project.calification, project.addedDate,
  project.quota, adviser.identifier as adviserIdentifier from project, adviser, investigationLine where project.adviserIdentifier = adviser.identifier
  and investigationLine.identifier = project.investigationLineIdentifier';
  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $sql = $sql.' and project.identifier like "%'.$identifier.'%"';
    $check = true;
  }

  if ($name != null && $name != '')
  {
    $sql = $sql.' and project.name like "%'.$name.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  if ($investigationLine != null && $investigationLine != 0)
  {
    $sql = $sql.' and project.investigationLineIdentifier = '.$investigationLine;

    if ($check == false)
    {
      $check = true;
    }
  }

  if ($calification != null && $calification != '')
  {
    $sql = $sql.' and project.calification like "%'.$calification.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  if ($addedDate != null && $addedDate != '')
  {
    $sql = $sql.' and project.addedDate like "%'.$addedDate.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  if ($quota != null && $quota != '')
  {
    $sql = $sql.' and project.quota like "%'.$quota.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  if ($adviserName != null || $adviserName != '')
  {
    $sql = $sql.' and adviser.name like "%'.$adviserName.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  $projectObjectsArray = readSimilarProjects ($sql);
  $size = sizeof ($projectObjectsArray);
  $jsonData = null;

  if ($projectObjectsArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $adviserObject = readSpecificAdviserByIdentifier ($projectObjectsArray [$i]->getAdviserIdentifier ());
      //$investigationLineObject = readSpecificInvestigationLineByIdentifier ();

      $jsonData [$i] = array
      (
        'identifier' => $projectObjectsArray [$i]->getIdentifier (), 'name' => $projectObjectsArray [$i]->getName (),
        'investigationLine' => $projectObjectsArray [$i]->getInvestigationLineIdentifier (), 'calification' => $projectObjectsArray [$i]->getCalification (),
        'addedDate' => $projectObjectsArray [$i]->getAddedDate (), 'quota' => $projectObjectsArray [$i]->getQuota (),
        'adviserName' => $adviserObject->getName ()
      );
    }
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
