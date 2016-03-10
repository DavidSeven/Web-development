<?php
  require ('project-crud.php');

  $name = $_POST ['name'];
  $date = $_POST ['date'];
  $calification = $_POST ['calification'];
  $investigationLine = $_POST ['investigationLine'];
  $authors = null;
  $i = 0;

  foreach ($_POST ['authors'] as $selectedItem)
  {
    $i ++;
    $authors [$i] = $selectedItem;
    echo $authors [$i];
  }
?>
