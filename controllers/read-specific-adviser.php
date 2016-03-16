<?php
  require_once ('adviser-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];

  $sql = 'select * from adviser where 1 = 1';
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

  if ($lastName != null && $lastName != '')
  {
    $sql = $sql.' and lastName like "%'.$lastName.'%"';

    if ($check == false)
    {
      $check = true;
    }
  }

  $adviserObjectsArray = readSimilarAdvisers ($sql);
  $size = sizeof ($adviserObjectsArray);
  $jsonData = null;

  if ($adviserObjectsArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [$i] = array
      (
        'identifier' => $adviserObjectsArray [$i]->getIdentifier (), 'name' => $adviserObjectsArray [$i]->getName (),
        'lastName' => $adviserObjectsArray [$i]->getLastName ()
      );
    }
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
