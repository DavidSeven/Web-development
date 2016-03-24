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
          <a id = "create" href = "#">
            <div class = "circle container-fluid" id = "link-to-create">
              <img src = "images/c.png" alt = "Crear">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a id = "read" href = "#">
            <div class = "circle container-fluid" id = "link-to-read">
              <img src = "images/r.jpg" alt = "Leer">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a id = "update" href = "#">
            <div class = "circle container-fluid" id = "link-to-update">
              <img src = "images/u.jpg" alt = "Actualizar">
            </div>
          </a>
        </section>
        <section class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
          <a id = "delete" href = "#">
            <div class = "circle container-fluid" id = "link-to-delete">
              <img src = "images/d.jpg" alt = "Eliminar" text-align = "center">
            </div>
          </a>
        </section>
      </section>
      <div class = "container" id = "container-create">
        <section class = "main row-fluid">
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/add-project.php">
              <div class = "circle-2 container-fluid" id = "link-to-project-create">
                <img src = "images/p.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/add-adviser.php">
              <div class = "circle-2 container-fluid" id = "link-to-adviser-create">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/add-author.php">
              <div class = "circle-2 container-fluid" id = "link-to-author-create">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/add-investigation-line.php">
              <div class = "circle-2 container-fluid" id = "link-to-investigation-line-create">
                <img src = "images/l.jpg" alt = "Crear">
              </div>
            </a>
          </div>
        </section>
      </div>
      <div class = "container" id = "container-read">
        <section class = "main row-fluid">
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/read-projects.php">
              <div class = "circle-2 container-fluid" id = "link-to-project-read">
                <img src = "images/p.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/read-advisers.php">
              <div class = "circle-2 container-fluid" id = "link-to-adviser-read">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/read-authors.php">
              <div class = "circle-2 container-fluid" id = "link-to-author-read">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/read-investigation-lines.php">
              <div class = "circle-2 container-fluid" id = "link-to-investigation-line-read">
                <img src = "images/l.jpg" alt = "Crear">
              </div>
            </a>
          </div>
        </section>
      </div>
      <div class = "container" id = "container-update">
        <section class = "main row-fluid">
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/update-projects.php">
              <div class = "circle-2 container-fluid" id = "link-to-project-update">
                <img src = "images/p.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/update-advisers.php">
              <div class = "circle-2 container-fluid" id = "link-to-adviser-update">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/update-authors.php">
              <div class = "circle-2 container-fluid" id = "link-to-author-update">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/update-investigation-lines.php">
              <div class = "circle-2 container-fluid" id = "link-to-investigation-line-update">
                <img src = "images/l.jpg" alt = "Crear">
              </div>
            </a>
          </div>
        </section>
      </div>
      <div class = "container" id = "container-delete">
        <section class = "main row-fluid">
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/delete-projects.php">
              <div class = "circle-2 container-fluid" id = "link-to-project-delete">
                <img src = "images/p.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/delete-advisers.php">
              <div class = "circle-2 container-fluid" id = "link-to-adviser-delete">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/delete-authors.php">
              <div class = "circle-2 container-fluid" id = "link-to-author-delete">
                <img src = "images/a.jpg" alt = "Crear">
              </div>
            </a>
          </div>
          <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <a href = "../views/delete-investigation-lines.php">
              <div class = "circle-2 container-fluid" id = "link-to-investigation-line-delete">
                <img src = "images/l.jpg" alt = "Crear">
              </div>
            </a>
          </div>
        </section>
      </div>
  </body>
</html>
