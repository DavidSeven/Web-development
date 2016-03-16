<?php
  require ('../public/init.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			head ('Add investigation line', 'other');
      javascript ('undefined');
      loader ();
		?>
	</head>
  <body>
    <header id = "form-header">
      <div class = "container">
        <h2 id = "h2-title">Add author</h2>
      </div>
    </header
    <div class = "container">
      <div class = "main row">
        <div class = "col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 container-fluid panel-color-il">
          <form name = "add-investigation-line-form">
            <table class = "table" id = "project">
              <tr>
        	       <td>Register investigation line</td>
    	        </tr>
    	        <tr>
    	           <td>
                   <label>Name:</label>
                   <input class = "form-control" type = "text" name = "name" placeholder = "Description" required/>
                 </td>
    	        </tr>
    	        <tr>
    	           <td>
                   <div class = "container button-container">
                     <div class = "main row">
                       <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
                         <input class = "btn btn-lg btn-success button-width center-block" type = "submit" value = "Save" name = "accept-2">
                       </div>
                       <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6">
    	  				         <input class = "btn btn-lg btn-danger button-width center-block" type = "reset" value = "Back" onclick = "document.location='../public/index.php'" />
                       </div>
                     </div>
                   </div>
                 </td>
    	        </tr>
            </table>
      </div>
    </div>
    <script src = "../public/js/add-investigation-line.js"></script>
  </body>
</html>
