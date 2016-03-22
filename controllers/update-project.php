<?php
  session_start ();

  if (isset ($_SESSION ['update-identifier']) == null)
  {
    if (isset ($_POST ['identifier']) != null)
    {
      $identifier = $_POST ['identifier'];
      $check = true;
    }
    else
    {
      $identifier = null;
      $check = false;
    }

    $jsonData = array ('identifier' => $identifier);

    if ($check)
    {
      $_SESSION ['update-identifier'] = $jsonData;
    }
  }
  else
  {
    $jsonData = $_SESSION ['update-identifier'];
    unset ($_SESSION ['update-identifier']);
  }

  header ('Content-type: application/json; charset=utf-8');
  echo json_encode ($jsonData);
  exit ();
?>
