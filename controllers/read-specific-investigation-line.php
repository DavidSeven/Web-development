<?php
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];

  $sql = 'select * from investigationLine where 1 = 1';
  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $sql = $sql.' and identifier like "%'.$identifier.'%"';
    $check = true;
  }

  if ($name != null && $name != '')
  {
    $sql = $sql.' and name like "%'.$name.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  $investigationLineObjectsArray = readSimilarInvestigationLines ($sql);
  $size = sizeof ($investigationLineObjectsArray);
  $jsonData = null;

  if ($investigationLineObjectsArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [$i] = array
      (
        'identifier' => $investigationLineObjectsArray [$i]->getIdentifier (), 'name' => $investigationLineObjectsArray [$i]->getName ()
      );
    }
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
