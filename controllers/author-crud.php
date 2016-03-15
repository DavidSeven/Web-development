<?php
  require_once ('../models/database.php');
  require_once ('../models/author.php');

  function readAuthors ()
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAllAuthors ()');
    $query->execute ();
    $result = $query->fetchAll ();
    $i = 0;
    $authorObjectsArray = null;

    foreach ($result as $key => $value)
    {
      $authorObjectsArray [$i] = new Author ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $authorObjectsArray;
  }
?>
