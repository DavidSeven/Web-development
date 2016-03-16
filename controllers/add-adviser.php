<?php
  require_once ('adviser-crud.php');

  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];
  createAdviser ($name, $lastName);
?>
