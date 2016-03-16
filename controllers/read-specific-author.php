<?php
  require_once ('author-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];

  $sql = 'select * from author where 1 = 1';
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

  $authorObjectsArray = readSimilarAuthors ($sql);
  $size = sizeof ($authorObjectsArray);
  $jsonData = null;

  if ($authorObjectsArray != null && $check == true)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      $jsonData [$i] = array
      (
        'identifier' => $authorObjectsArray [$i]->getIdentifier (), 'name' => $authorObjectsArray [$i]->getName (),
        'lastName' => $authorObjectsArray [$i]->getLastName ()
      );
    }
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
