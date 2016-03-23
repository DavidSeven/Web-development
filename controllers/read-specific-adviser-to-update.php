<?php
  require_once ('adviser-crud.php');

  $identifier = $_POST ['identifier'];

  $check = false;

  if ($identifier != null && $identifier != '')
  {
    $adviserObject = readSpecificAdviserByIdentifier ($identifier);
    $check = true;
  }

  $jsonData = null;

  if ($adviserObject != null && $check == true)
  {
    $jsonData = array
    (
      'identifier' => $adviserObject->getIdentifier (), 'name' => $adviserObject->getName (),
      'lastName' => $adviserObject->getLastName ()
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
