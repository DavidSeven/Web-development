<?php
  require ('project-crud.php');

  $name = $_POST ['name'];
  $addedDate = $_POST ['date'];
  $calification = $_POST ['calification'];
  $investigationLine = $_POST ['investigationLine'];
  $adviserIdentifier = $_POST ['advisers'];
  $authors = null;
  $i = 0;

  foreach ($_POST ['authors'] as $selectedItem)
  {
    $i ++;
    $authors [$i] = $selectedItem;
  }

  if ($addedDate == null)
  {
    $addedDate = null;
  }

  if ($calification == null)
  {
    $calification = null;
  }

  createProject ($name, $investigationLine, $calification, $addedDate, $adviserIdentifier);
?>
