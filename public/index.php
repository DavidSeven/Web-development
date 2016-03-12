<?php
  require ('init.php');
?>

<!DOCTYPE HTML>
<html>
  <head>
    <?php
      head ('undefined', 'index');
      javascript ('index');
      indexAnimation ();
      loader ();
    ?>
  </head>
  <body>
    <header>
      <div class = "container">
        <h1 id = "h1-title">Degree works</h1>
      </div>
    </header>
    <div class = "container">
      <section class = "main row-fluid">
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "../views/add-project.php">
            <div class = "circle container-fluid" id = "link-to-create">
              <img src = "images/c.png" alt = "Crear">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "../views/read-projects.php">
            <div class = "circle container-fluid" id = "link-to-read">
              <img src = "images/r.jpg" alt = "Leer">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid" id = "link-to-update">
              <img src = "images/u.jpg" alt = "Actualizar">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid" id = "link-to-delete">
              <img src = "images/d.jpg" alt = "Eliminar" text-align = "center">
            </div>
          </a>
        </section>
      </section>
    </div>
  </body>
</html>
