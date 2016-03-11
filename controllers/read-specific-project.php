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
  if ($identifier != null && $identifier != '')
  {
    $sql = $sql.' and identifier like "%'.$identifier.'%"';
  }

  if ($name != null && $name != '')
  {
    $sql = $sql.' and name like "%'.$name.'%"';
  }

  if ($investigationLine != null && $investigationLine != '')
  {
    $sql = $sql.' and investigationLine like "%'.$investigationLine.'%"';
  }

  if ($calification != null && $calification != '')
  {
    $sql = $sql.' and calification like "%'.$calification.'%"';
  }

  if ($addedDate != null && $addedDate != '')
  {
    $sql = $sql.' and addedDate like "%'.$addedDate.'%"';
  }

  if ($quota != null && $quota != '')
  {
    $sql = $sql.' and quota like "%'.$quota.'%"';
  }

/*  if ($adviserName != null || $adviserName != '')
  {
    $sql += ' and adviserName like %"'.$adviserName.'"%';
  }*/

  $projectsObjectArray = readSimilarProjects ($sql);
  $size = sizeof ($projectsObjectArray);

  if ($projectsObjectArray != null && $size > 1)
  {
    for ($i = 0; $i < $size; $i ++)
    {
      echo $projectsObjectArray [$i]->getName ().'<br>';
    }
  }
  else
  {
    echo $projectsObjectArray->getName ().'<br>';
  }
?>
