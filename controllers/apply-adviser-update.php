<?php
  require_once ('adviser-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];
  updateAdviser ($identifier, $name, $lastName);
  exit ();
?>
