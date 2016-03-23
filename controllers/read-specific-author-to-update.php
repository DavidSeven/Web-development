<?php
  require_once ('author-crud.php');

  $identifier = $_POST ['identifier'];

  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $authorObject = readSpecificAuthorByIdentifier ($identifier);
    $check = true;
  }

  $jsonData = null;

  if ($authorObject != null && $check == true)
  {
    $jsonData = array
    (
      'identifier' => $authorObject->getIdentifier (), 'name' => $authorObject->getName (),
      'lastName' => $authorObject->getLastName ()
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
