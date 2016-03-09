<?php
  function head ($title, $root)
  {
    ?>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, user-scalable = no, initial-scale = 1">
    <?php
    if ($root != 'index')
    {
      ?>
      <title>
        <?php
          echo $title;
        ?>
      </title>
      <link rel = "stylesheet" href = "../public/css/bootstrap.min.css">
      <link rel = "stylesheet" href = "../public/css/styles.css">
      <?php
    }
    else
    {
      ?>
      <title>Degree works</title>
      <link rel = "stylesheet" href = "css/bootstrap.min.css">
      <link rel = "stylesheet" href = "css/styles.css">
      <?php
    }
  }

  function javascript ($root)
  {
    if ($root != 'index')
    {
      ?>
      <script src = "../public/js/jquery.min.js"></script>
      <script src = "../public/js/bootstrap.min.js"></script>
      <?php
    }
    else
    {
      ?>
      <script src = "js/jquery.min.js"></script>
      <script src = "js/bootstrap.min.js"></script>
      <?php
    }
  }

  function indexAnimation ()
  {
    ?>
    <script src = "js/animations.js"></script>
    <?php
  }

  function loader ()
  {
    ?>
    <div id = "pre-loader">
      <div id = "loader" class = "main row">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <img src = "../public/images/loader.gif">
        </div>
      </div>
    </div>
    <?php
      if (getUrl () != '/degree_works/public/index.php')
      {
        ?>
          <script src = "../public/js/loader.js"></script>
        <?php
      }
      else
      {
          ?>
          <script src = "js/loader.js"></script>
          <?php
      }
  }

  function getUrl ()
  {
    $url = $_SERVER ['REQUEST_URI'];
    return $url;
  }
?>
