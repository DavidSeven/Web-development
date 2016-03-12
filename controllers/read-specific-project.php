<?php
  require ('project-crud.php');
  require ('adviser-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $investigationLine = $_POST ['investigationLine'];
  $calification = $_POST ['calification'];
  $addedDate = $_POST ['addedDate'];
  $quota = $_POST ['quota'];
  $adviserName = $_POST ['adviser-name'];

  $sql = 'select project.identifier, project.name, project.investigationLine, project.calification, project.addedDate,
  project.quota, adviser.identifier as adviserIdentifier from project, adviser where project.adviserIdentifier = adviser.identifier';
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

  if ($investigationLine != null && $investigationLine != '')
  {
    $sql = $sql.' and project.investigationLine like "%'.$investigationLine.'%"';

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
    $sql += ' and adviser.name like %"'.$adviserName.'"%';

    if ($check == false)
    {
      $check = true;
    }
  }

  $projectsObjectArray = readSimilarProjects ($sql);
  $size = sizeof ($projectsObjectArray);

  if ($projectsObjectArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $adviserObject = readSpecificAdviserByIdentifier ($projectsObjectArray [$i]->getAdviserIdentifier ());
      /*$jsonData ['identifier'] = $projectsObjectArray [$i]->getIdentifier ();
      $jsonData ['name'] = $projectsObjectArray [$i]->getName ();
      $jsonData ['investigationLine'] = $projectsObjectArray [$i]->getInvestigationLine ();
      $jsonData ['calification'] = $projectsObjectArray [$i]->getCalification ();
      $jsonData ['addedDate'] = $projectsObjectArray [$i]->getAddedDate ();
      $jsonData ['quota'] = $projectsObjectArray [$i]->getQuota ();
      $jsonData ['adviserName'] = $adviserObject->getName ();*/


      /*$jsonData [$i] = array
      (
        'identifier' => $projectsObjectArray [$i]->getIdentifier (), 'name' => $projectsObjectArray [$i]->getName (),
        'investigationLine' => $projectsObjectArray [$i]->getInvestigationLine (), 'calification' => $projectsObjectArray [$i]->getCalification (),
        'addedDate' => $projectsObjectArray [$i]->getAddedDate (), 'quota' => $projectsObjectArray [$i]->getQuota (),
        'adviserName' => $adviserObject->getName ()
      );*/
      /*$adviserObject = readSpecificAdviserByIdentifier ($projectsObjectArray [$i]->getAdviserIdentifier ());
      echo $projectsObjectArray [$i]->getIdentifier ().'<br>';
      echo $projectsObjectArray [$i]->getName ().'<br>';
      echo $projectsObjectArray [$i]->getInvestigationLine ().'<br>';
      echo $projectsObjectArray [$i]->getCalification ().'<br>';
      echo $projectsObjectArray [$i]->getAddedDate ().'<br>';
      echo $projectsObjectArray [$i]->getQuota ().'<br>';
      echo $adviserObject->getName ().'<br>';*/
    }
    $jsonData ['hola'] = 10;
  }
  else
  {
    $jsonData ['hola'] = 20;
  }

  header ('Content-type: application/json; charset=utf-8');
  json_encode ($jsonData);
  exit ();
?>
