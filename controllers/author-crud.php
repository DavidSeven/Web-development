<?php
  require_once ('../models/database.php');
  require_once ('../models/author.php');

  function createAuthor ($name, $lastName)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $authorObject = new Author ("", $name, $lastName);
    $query = $connection->prepare ('CALL spSetAuthor ("'.$authorObject->getName ().'", "'.$authorObject->getLastName ().'")');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }

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

  function readSimilarAuthors ($sql)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ($sql);
    $query->execute ();
    $result = $query->fetchAll ();
    $authorObjectsArray = null;
    $i = 0;

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

  function readSpecificAuthorByIdentifier ($identifier)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spGetAuthorByIdentifier ('.$identifier.')');
    $query->execute ();
    $result = $query->fetchAll ();
    $authorObject = null;

    foreach ($result as $key => $value)
    {
      $authorObject = new Author ($identifier, $value ['name'], $value ['lastName']);
    }

    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
    return $authorObject;
  }

  function updateAuthor ($identifier, $name, $lastName)
  {
    $databaseObject = new Database ();
    $connection = $databaseObject->connect ();
    $query = $connection->prepare ('CALL spUpdateAuthor ('.$identifier.', "'.$name.'", "'.$lastName.'")');
    $query->execute ();
    $query->closeCursor ();
    $connection = null;
    $databaseObject = null;
  }
?>
