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
          $("select[name=investigationLine]").val () == 0 && ($("input[name=calification]").val () == null || $("input[name=calification]").val () == "") &&
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
              if (data != null)
              {
                var size = data.length;
                $("form[name=filter-form]") [0].reset ();
                $(".rm").remove ();
                console.log ("Package sent");
                console.log ("Dataset:");
                console.log (data);
                var newRows = "";
                var tableTiles = "<tr id = 'table-titles' class = 'rm'><td>Identifier</td><td>Name</td><td>Investigation line</td><td>Calification</td><td>Added date</td><td>Adviser name</td><td>Quota</td></tr>";

                for (var i = 0; i < size; i ++)
                {
                  newRows += "<tr class = 'rm'>";
                  newRows += "<td>" + data [i].identifier + "</td>";
                  newRows += "<td>" + data [i].name + "</td>";
                  newRows += "<td>" + data [i].investigationLine + "</td>";
                  newRows += "<td>" + data [i].calification + "</td>";
                  newRows += "<td>" + data [i].addedDate + "</td>";
                  newRows += "<td>" + data [i].adviserName + "</td>";
                  newRows += "<td>" + data [i].quota + "</td>";
                  newRows += "</tr>";
                }

                $("#table-read").prepend (newRows);
                $(".rm").css ("display", "none");
                $(".rm").fadeIn (300);
                $("#table-read").prepend (tableTiles);
              }
              else
              {
                alert ("Nothing");
              }
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
