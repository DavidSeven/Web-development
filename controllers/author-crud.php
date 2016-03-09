<?php
  require ('../models/database.php');
  require ('../models/author.php');

  $databaseObject = new Database ();
  $databaseObject->connect ();

  function create ($identifier, $name, $lastName)
  {
    $authorsObjectArray = new Author ($identifier, $name, $lastName);
  }

  function read ()
  {
    $query->$databaseObject->prepare ('CALL spGetAllAuthors ()');
    $query->execute ();
    $result->fetchAll ();
    $i = 0;

    foreach ($result as $key => $value)
    {
      $authorsObjectArray [$i] = new Author ($value ['identifier'], $value ['name'], $value ['lastName']);
      $i ++;
    }

    return $authorsObjectArray;
  }

  function update ()
  {

  }

  function delete ()
  {

  }
?>
