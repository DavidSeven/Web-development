<?php
  require_once ('author-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $lastName = $_POST ['last-name'];
  updateAuthor ($identifier, $name, $lastName);
  exit ();
?>
