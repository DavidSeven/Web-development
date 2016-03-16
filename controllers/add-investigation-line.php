<?php
  require_once ('investigation-line-crud.php');

  $name = $_POST ['name'];
  createInvestigationLine ($name);
?>
