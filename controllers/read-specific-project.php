<?php
  require ('project-crud.php');

  $identifier = $_POST ['identifier'];
  $name = $_POST ['name'];
  $investigationLine = $_POST ['investigationLine'];
  $calification = $_POST ['calification'];
  $addedDate = $_POST ['addedDate'];
  $quota = $_POST ['quota'];
  $adviserName = $_POST ['adviser-name'];

  $sql = 'select * from project where 1 = 1';
echo $name;
  if ($identifier != null && $identifier != '')
  {
    $sql += ' and identifier like %'.$identifier.'%';
  }

  if ($name != null && $name != '')
  {
    $sql += ' and name like %"'.$name.'"%';
  }

  if ($investigationLine != null && $investigationLine != '')
  {
    $sql += ' and investigationLine like %"'.$investigationLine.'"%';
  }

  if ($calification != null && $calification != '')
  {
    $sql += ' and calification like %'.$calification.'%';
  }

  if ($addedDate != null && $addedDate != '')
  {
    $sql += ' and addedDate like %'.$addedDate.'%';
  }

  if ($quota != null && $quota != '')
  {
    $sql += ' and quota like %'.$quota.'%';
  }

/*  if ($adviserName != null || $adviserName != '')
  {
    $sql += ' and adviserName like %"'.$adviserName.'"%';
  }*/
$projectsObjectArray= null;
  $projectsObjectArray = readSimilarProjects ($sql);
  /*if ($projectsObjectArray != null && sizeof ($projectsObjectArray) >= 1){
  for ($i = 0; $i < sizeof ($projectsObjectArray); $i ++)
  {
    echo $projectsObjectArray [$i]->getName ().'<br>';
  }}else {echo "nada";}*/
?>
