<?php
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];

  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $investigationLineObject = readSpecificInvestigationLineByIdentifier ($identifier);
    $check = true;
  }

  $jsonData = null;

  if ($investigationLineObject != null && $check == true)
  {
    $jsonData = array
    (
      'identifier' => $investigationLineObject->getIdentifier (), 'name' => $investigationLineObject->getName ()    
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
