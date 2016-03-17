<?php
  $identifier = $_POST ['identifier'];
  $jsonData = {'identifier' => $identifier};
  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
