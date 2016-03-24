<?php
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  updateInvestigationLine ($identifier, $name);
  exit ();
?>
