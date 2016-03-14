<?php
  require_once ('../models/database.php');
  require ('../models/author.php');

  function readAuthor ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllAuthors ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $authorsObjectArray = null;

    foreach ($result as $key => $value)
    {
      $authorsObjectArray [$i] = new Author ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $authorsObjectArray;
  }
?>
