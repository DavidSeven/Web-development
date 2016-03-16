<?php
  require_once ('project-crud.php');
  require_once ('adviser-crud.php');
  require_once ('investigation-line-crud.php');

  $sql = 'select project.identifier, project.name, investigationLine.name as investigationLineName, project.calification, project.addedDate,
  project.quota, adviser.identifier as adviserIdentifier from project, adviser, investigationLine where project.adviserIdentifier = adviser.identifier
  and investigationLine.identifier = project.investigationLineIdentifier';

  $projectObjectsArray = readSimilarProjects ($sql);
  $size = sizeof ($projectObjectsArray);
  $jsonData = null;

  if ($projectObjectsArray != null)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $adviserObject = readSpecificAdviserByIdentifier ($projectObjectsArray [$i]->getAdviserIdentifier ());

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
