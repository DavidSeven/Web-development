<?php
  require_once ('investigation-line-crud.php');

  $sql = 'select * from investigationLine';

  $investigationLineObjectsArray = readSimilarInvestigationLines ($sql);
  $size = sizeof ($investigationLineObjectsArray);
  $jsonData = null;

  for ($i = 0; $i < $size; $i ++)
  {
    $jsonData [$i] = array
    (
      'identifier' => $investigationLineObjectsArray [$i]->getIdentifier (), 'name' => $investigationLineObjectsArray [$i]->getName ()
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
