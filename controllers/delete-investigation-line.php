<?php
  require_once ('investigation-line-crud.php');

  $identifier = $_POST ['identifier'];
  deleteInvestigationLine ($identifier);
?>
