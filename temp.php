<?php
  session_start ();
  if (isset ($_SESSION ['update-identifier']) == null)
  {
    echo 'null';
  }
  else {
    echo 'no null';
  }
  unset ($_SESSION ['update-identifier']);
?>
