<?php
  require_once ('adviser-crud.php');

  $sql = 'select * from adviser';

  $adviserObjectsArray = readSimilarAdvisers ($sql);
  $size = sizeof ($adviserObjectsArray);
  $jsonData = null;

  for ($i = 0; $i < $size; $i ++)
  {
    $jsonData [$i] = array
    (
      'identifier' => $adviserObjectsArray [$i]->getIdentifier (), 'name' => $adviserObjectsArray [$i]->getName (),
      'lastName' => $adviserObjectsArray [$i]->getLastName ()
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
