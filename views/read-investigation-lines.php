<?php
  require ('../public/init.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			head ('Read investigation line', 'other');
      javascript ('undefined');
      loader ();
		?>
	</head>
  <body>
    <header id = "form-header">
      <div class = "container">
        <h2 id = "h2-title">Read investigation line</h2>
      </div>
    </header>
    <div class = "container">
      <div class = "main row">
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 container-fluid">
          <table class = "table" id = "table-read">
            <tr id = "table-titles" class = "rm">
        	    <td>Identifier</td>
              <td>Name</td>
    	      </tr>
            <tr id = "open-filters">
              <td colspan = "2">
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
              <td colspan = "2">Filters:</td>
            </tr>
            <tr id = "filters">
              <td colspan = "2">
                <form name = "filter-form">
                  <div class = "container">
                    <div class = "main row-fluid">
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Identifier</label>
                        <input class = "form-control center-block" type = "number" name = "identifier" placeholder = "Identifier"/>
                      </div>
                      <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6 filters-padding">
                        <label>Name</label>
                        <input class = "form-control center-block" type = "text" name = "name" placeholder = "Description"/>
                      </div>
                    </div>
                   </div>
                </form>
              </td>
            </tr>
            <tr id = "button-filters">
              <td colspan = "2">
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
    <script src = "../public/js/read-investigation-line.js"></script>
  </body>
</html>
