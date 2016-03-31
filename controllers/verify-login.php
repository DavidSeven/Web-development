<?php
  session_start ();
  $jsonData = null;

  if (isset ($_SESSION ['user-online']) == null)
  {
    $jsonData = null;
  }
  else
  {
    $jsonData = array
    (
      'nickname' => $_SESSION ['user-online']['nickname'], 'type' => $_SESSION ['user-online']['type']
    );
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
