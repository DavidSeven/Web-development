<?php
  require ('../public/init.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			head ('Update project', 'other');
      javascript ('undefined');
      loader ();
		?>
	</head>
  <body>
    <header id = "form-header">
      <div class = "container">
        <h2 id = "h2-title">Update project</h2>
      </div>
    </header
    <div class = "container">
      <div class = "main row">
        <div class = "col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 container-fluid panel-color">
          <form name = "add-project-form">
            <table class = "table" id = "project-1">
              <tr>
        	       <td colspan = "2">Update project</td>
    	        </tr>
    	        <tr>
    	           <td align = "left">Name:</td>
                 <td id = "hidden-project-id">
                   <input class = "form-control" type = "number" name = "identifier"/>
                 </td>
    	           <td>
                   <input class = "form-control" type = "text" name = "name" placeholder = "Project name" required/>
                 </td>
    	        </tr>
    	        <tr>
    	           <td align = "left">Date:</td>
    	           <td>
                   <input class = "form-control" type = "date" name = "addedDate" placeholder = "Added date" id = "addedDate"/>
                 </td>
    	        </tr>
    	        <tr>
    	           <td align = "left">Calification:</td>
    	           <td>
                   <input class = "form-control" type = "number" min = "0" max = "5" name = "calification" placeholder = "Final calification"/>
                 </td>
    	        </tr>
    	        <tr>
    	           <td align = "left">Investigation line:</td>
    	           <td>
                   <select class = "form-control" name = "investigationLine">
                   </select>
                 </td>
    	        </tr>
    	        <tr>
    	           <td colspan = "2">
                   <div class = "container button-container">
                     <div class = "main row">
                       <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <input class = "btn btn-lg btn-success button-width center-block" type = "button" value = "Continue" name = "accept">
                       </div>
                       <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
    	  				         <input class = "btn btn-lg btn-danger button-width center-block" type = "reset" value = "Back" onclick = "document.location='../views/update-projects.php'" />
                       </div>
                     </div>
                   </div>
                 </td>
    	        </tr>
            </table>
            <div class = "container" id = "project-2">
              <div class = "main row">
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 form-label" id = "authors-label">
                  <label>Authors:</label>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 div-select">
                  <select class = "form-control" multiple = "multiple" name = "authors[]" id = "authorsSelect">
                  </select>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 form-label" id = "advisers-label">
                  <label>Adviser:</label>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 move-select">
                  <select class = "form-control" name = "advisers">
                  </select>
                  <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class = "container button-container" id = "button-container-2">
                      <div class = "main row">
                        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <input class = "btn btn-lg btn-success button-width center-block" type = "submit" value = "Save" name = "accept-2">
                        </div>
                        <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
     	  				         <input class = "btn btn-lg btn-danger button-width center-block" type = "button" value = "Back" name = "back-2"/>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src = "../public/js/update-specific-project.js"></script>
  </body>
</html>
