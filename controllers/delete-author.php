<?php
  require_once ('author-crud.php');
  require_once ('project-crud.php');

  $identifier = $_POST ['identifier'];
  $projectIdentifier = readProjectIdentifierByAuthorIdentifier ($identifier);
  deleteAuthor ($identifier);
  increaseProjectQuota ($projectIdentifier);
?>
