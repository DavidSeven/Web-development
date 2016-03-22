<?php
  require_once ('project-crud.php');
  require_once ('adviser-crud.php');
  require_once ('author-crud.php');
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];

  $sql = 'select project.identifier, project.name, investigationLine.name as investigationLineName, project.calification, project.addedDate,
  project.quota, adviser.identifier as adviserIdentifier from project, adviser, investigationLine where project.adviserIdentifier = adviser.identifier
  and investigationLine.identifier = project.investigationLineIdentifier';
  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $sql = $sql.' and project.identifier = '.$identifier;
    $check = true;
  }

  $projectObjectsArray = readSimilarProjects ($sql);
  $includesArray = readAllIncludesRelation ();
  $authorObjectsArray = readAuthors ();
  $adviserObjectsArray = readAdvisers ();
  $investigationLineObjectsArray = readInvestigationLines ();
  $size = sizeof ($projectObjectsArray);
  $jsonData = null;

  if ($projectObjectsArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $adviserObject = readSpecificAdviserByIdentifier ($projectObjectsArray [$i]->getAdviserIdentifier ());

      $jsonData [0][$i] = array
      (
        'identifier' => $projectObjectsArray [$i]->getIdentifier (), 'name' => $projectObjectsArray [$i]->getName (),
        'investigationLine' => $projectObjectsArray [$i]->getInvestigationLineIdentifier (), 'calification' => $projectObjectsArray [$i]->getCalification (),
        'addedDate' => $projectObjectsArray [$i]->getAddedDate (), 'quota' => $projectObjectsArray [$i]->getQuota (),
        'adviserIdentifier' => $projectObjectsArray [$i]->getAdviserIdentifier (), 'adviserName' => $adviserObject->getName ()
      );
    }

    $size = sizeof ($includesArray);
    $j = 0;

    for ($i = 0; $i < $size; $i ++)
    {

      if ($includesArray [$i][1] == $projectObjectsArray [0]->getIdentifier ())
      {
        $jsonData [1][$j] = array ('identifier' => $includesArray [$i][0]);
        $j ++;
      }
    }

    $size = sizeof ($authorObjectsArray);

    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [2][$i] = array
      (
        'identifier' => $authorObjectsArray [$i]->getIdentifier (), 'name' => $authorObjectsArray [$i]->getName (),
        'lastName' => $authorObjectsArray [$i]->getLastName ()
      );
    }

    $size = sizeof ($adviserObjectsArray);

    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [3][$i] = array
      (
        'identifier' => $adviserObjectsArray [$i]->getIdentifier (), 'name' => $adviserObjectsArray [$i]->getName (),
        'lastName' => $adviserObjectsArray [$i]->getLastName ()
      );
    }

    $size = sizeof ($investigationLineObjectsArray);

    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [4][$i] = array
      (
        'identifier' => $investigationLineObjectsArray [$i]->getIdentifier (), 'name' => $investigationLineObjectsArray [$i]->getName ()
      );
    }
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
