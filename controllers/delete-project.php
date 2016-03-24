<?php
  require_once ('project-crud.php');

  $identifier = $_POST ['identifier'];
  deleteProject ($identifier);
?>
