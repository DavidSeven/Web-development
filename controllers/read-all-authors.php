<?php
  require_once ('author-crud.php');

  $authorObjectsArray = readAuthors ();
  $size = sizeof ($authorObjectsArray);
  $jsonData = null;

  if ($authorObjectsArray != null)
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
