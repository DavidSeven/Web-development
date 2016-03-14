$(document).ready
(
  function ()
  {
    $("input[name=filter]").click
    (
      function ()
      {
        $("#table-read tr").fadeOut
        (
          300, function ()
          {
            $("#table-titles").fadeIn
            (
              300, function ()
              {
                $("#filters-title").fadeIn
                (
                  300, function ()
                  {
                    $("#filters").fadeIn (
                      300, function ()
                      {
                        $("#button-filters").fadeIn (300);
                      }
                    );
                  }
                );
              }
            );
          }
        );
      }
    );

    $("input[name=back-to-table]").click
    (
      function ()
      {
        $("#table-read tr").fadeIn (300);
        $("#button-filters").css ("display", "none");
        $("#filters-title").css ("display", "none");
        $("#filters").css ("display", "none");
      }
    );

    $("input[name=search]").click
    (
      function ()
      {
        if
        (
          ($("input[name=identifier]").val () == null || $("input[name=identifier]").val () == "") && ($("input[name=name]").val () == null || $("input[name=name]").val () == "") &&
          ($("input[name=investigationLine]").val () == null || $("input[name=investigationLine]").val () == "") && ($("input[name=calification]").val () == null || $("input[name=calification]").val () == "") &&
          ($("input[name=addedDate]").val () == null || $("input[name=addedDate]").val () == "") && ($("input[name=quota]").val () == null || $("input[name=quota]").val () == "") &&
          ($("input[name=adviser-name]").val () == null || $("input[name=adviser-name]").val () == "")
        )
        {
          alert ("All filters are empty.");
        }
        else
        {
          $.ajax
          ({
            type: "post",
            url: "../controllers/read-specific-project.php",
            data: $("form[name=filter-form]").serialize (),
            encode: true,
            success: function (data)
            {
              var size = data.length;
              $("form[name=filter-form]") [0].reset ();
              $("#table-read").find ("tr:gt(0)").remove ();
              console.log ("Package sent");
              console.log ("Dataset:");
              console.log (data);
              var newRow = "";
              var newFilterButtons ="<tr id = 'open-filters'><td colspan = '7'><div class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12' id = 'button-main-div'><div class = 'container button-container' id = 'button-container-2'><div class = 'main row'><div class = 'col-xs-6 col-sm-6 col-md-6 col-lg-6'><input class = 'btn btn-lg btn-success button-width center-block' type = 'button' value = 'Filter' name = 'filter'></div><div class = 'col-xs-6 col-sm-6 col-md-6 col-lg-6'><input class = 'btn btn-lg btn-danger button-width center-block' type = 'button' value = 'Back' name = 'back-to-index' onclick = 'document.location=" + '"../public/index.php"' + "'/></div></div></div></div></td></tr>";

              for (var i = 0; i < size; i ++)
              {
                newRow += "<tr>";
                newRow += "<td>" + data [i].identifier + "</td>";
                newRow += "<td>" + data [i].name + "</td>";
                newRow += "<td>" + data [i].investigationLine + "</td>";
                newRow += "<td>" + data [i].calification + "</td>";
                newRow += "<td>" + data [i].addedDate + "</td>";
                newRow += "<td>" + data [i].adviserName + "</td>";
                newRow += "<td>" + data [i].quota + "</td>";
                newRow += "</tr>";
              }

              $("#table-read").append (newRow);
              $("#table-read").append (newFilterButtons);
            },
            error: function (data)
            {
              console.log ("Package unsent");
              console.log (data);
            }
          });
        }
      }
    );
  }
);
