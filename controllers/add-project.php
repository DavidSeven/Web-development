<?php
  require ('project-crud.php');

  $name = $_POST ['name'];
  $addedDate = $_POST ['addedDate'];
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

  if ($calification == null)
  {
    $calification = 0;
  }

  createProject ($name, $investigationLine, $calification, $addedDate, $adviserIdentifier);
?>
