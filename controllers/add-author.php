<?php
  require_once ('author-crud.php');

  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];
  createAuthor ($name, $lastName);
?>
