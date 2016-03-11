<?php
  require ('../controllers/init.php');
  require ('../controllers/project-crud.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			head ('Add project', 'other');
      javascript ('undefined');
      loader ();
		?>
	</head>
  <body>
    <header id = "form-header">
      <div class = "container">
        <h2 id = "h2-title">Read projects</h2>
      </div>
    </header>
    <div class = "container">
      <div class = "main row">
        <div class = "col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-6 col-lg-offset-2 container-fluid">
          <table class = "table">
            <tr>
        	    <td>Identifier</td>
              <td>Name</td>
              <td>Investigation line</td>
              <td>Calification</td>
              <td>Added date</td>
              <td>Adviser identifier</td>
              <td>Quota</td>
    	      </tr>
            <?php
              $projectsObjectArray = readProject ();
              $size = sizeof ($projectsObjectArray);

              for ($i = 0; $i < $size; $i ++)
              {
                echo '<tr>
                        <td>'.$projectsObjectArray [$i]->getIdentifier ().'</td>
                        <td>'.$projectsObjectArray [$i]->getName ().'</td>
                        <td>'.$projectsObjectArray [$i]->getInvestigationLine ().'</td>
                        <td>'.$projectsObjectArray [$i]->getCalification ().'</td>
                        <td>'.$projectsObjectArray [$i]->getAddedDate ().'</td>
                        <td>'.$projectsObjectArray [$i]->getAdviserIdentifier ().'</td>
                        <td>'.$projectsObjectArray [$i]->getQuota ().'</td>
                      </tr>';
              }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
