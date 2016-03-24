<?php
  require ('../public/init.php');
  require ('../controllers/project-crud.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			head ('Delete project', 'other');
      javascript ('undefined');
      loader ();
		?>
	</head>
  <body>
    <header id = "form-header">
      <div class = "container">
        <h2 id = "h2-title">Delete projects</h2>
      </div>
    </header>
    <div class = "container">
      <div class = "main row">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 container-fluid">
          <table class = "table" id = "table-read">
            <tr id = "table-titles" class = "rm">
        	    <td>Identifier</td>
              <td>Name</td>
              <td>Investigation line</td>
              <td>Calification</td>
              <td>Added date</td>
              <td>Adviser name</td>
              <td>Quota</td>
              <td>Option</td>
    	      </tr>
            <tr id = "open-filters">
              <td colspan = "8">
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" id = "button-main-div">
                  <div class = "container button-container" id = "button-container-2">
                    <div class = "main row">
                      <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class = "btn btn-lg btn-success button-width center-block" type = "button" value = "Filter" name = "filter">
                      </div>
                      <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class = "btn btn-lg btn-danger button-width center-block" type = "button" value = "Back" name = "back-to-index" onclick = "document.location='../public/index.php'"/>
                      </div>
                    </div>
                   </div>
                 </div>
               </td>
            </tr>
            <tr id = "filters-title">
              <td colspan = "8">Filters:</td>
            </tr>
            <tr id = "filters">
              <td colspan = "8">
                <form name = "filter-form">
                  <div class = "container">
                    <div class = "main row-fluid">
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Identifier</label>
                        <input class = "form-control center-block" type = "number" name = "identifier" placeholder = "Identifier"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Name</label>
                        <input class = "form-control center-block" type = "text" name = "name" placeholder = "Name"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Investigation line</label>
                        <select class = "form-control" name = "investigationLine">
                          <option value = "0">Choose an investigation line</option>
                          <?php
                            $investigationLineObjectsArray = readInvestigationLines ();
                            $size = sizeof ($investigationLineObjectsArray);

                            for ($i = 0; $i < $size; $i ++)
                            {
                              echo '<option value = "'.$investigationLineObjectsArray [$i]->getIdentifier ().'">'.$investigationLineObjectsArray [$i]->getName ().'</option>';
                            }
                          ?>
                        </select>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Calification</label>
                        <input class = "form-control center-block" type = "number" min = "0" max = "5" name = "calification" placeholder = "Calification"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Added date</label>
                        <input class = "form-control center-block" type = "date" name = "addedDate" placeholder = "Added date" id = "addedDate"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Quota</label>
                        <input class = "form-control center-block" type = "number" name = "quota" placeholder = "Quota"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Adviser name</label>
                        <input class = "form-control center-block" type = "text" name = "adviser-name" placeholder = "Adviser name"/>
                      </div>
                    </div>
                   </div>
                </form>
              </td>
            </tr>
            <tr id = "button-filters">
              <td colspan = "8">
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class = "container button-container">
                    <div class = "main row">
                      <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class = "btn btn-lg btn-success button-width center-block" type = "button" value = "Search" name = "search">
                      </div>
                      <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class = "btn btn-lg btn-danger button-width center-block" type = "button" value = "Back" name = "back-to-table"/>
                      </div>
                    </div>
                   </div>
                 </div>
               </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class = "container" id = "confirmation-message">
      <div class = "main row-fluid">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 container-fluid" id = "main-div">
          <div id = "internal-div" class = "container button-container">
            <p>¿Are you sure you want to delete this record?</p>
            <div class = "main row-fluid">
              <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input class = "btn btn-lg btn-danger button-width center-block" type = "button" value = "Yes" name = "delete-btn">
              </div>
              <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input class = "btn btn-lg btn-danger button-width center-block" type = "button" value = "No" name = "back-btn">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src = "../public/js/delete-project.js"></script>
  </body>
</html>
