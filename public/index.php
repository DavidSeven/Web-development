<?php
  require ('../controllers/init.php');
?>

<!DOCTYPE HTML>
<html>
  <head>
    <?php
      head ();
    ?>
  </head>
  <body>
    <header>
      <div class = "container">
        <h1>Trabajos de grado</h1>
      </div>
    </header>
    <div class = "container">
      <section class = "main row-fluid">
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid">
              <img src = "images/c.jpg" alt = "Crear">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid">
              <img src = "images/r.jpg" alt = "Leer">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid">
              <img src = "images/u.jpg" alt = "Actualizar">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a href = "#">
            <div class = "circle container-fluid">
              <img src = "images/d.jpg" alt = "Eliminar" text-align = "center">
            </div>
          </a>
        </section>
      </section>
    </div>
    <?php
      javascript ();
    ?>
  </body>
</html>
