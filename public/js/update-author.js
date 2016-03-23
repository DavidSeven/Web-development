$(document).ready
(
  function ()
  {
    $("#table-read").click
    (
      function (e)
      {
        if (e.target.nodeName == "A")
        {
          var id = e.target.id;

          $.ajax
          ({
            type: "post",
            url: "../controllers/pass-identifier.php",
            data: {identifier: id},
            encode: true,

            success: function (data)
            {
              console.log (data);
              console.log ("Identifier: " + data.identifier);
              window.location.href = "update-specific-author.php";
            },

            error: function (data)
            {
              console.log (data);
            }
          });
        }

        console.log (e);
      }
    );

    $.ajax
    ({
      type: "post",
      url: "../controllers/read-all-authors.php",
      data: $("form[name=filter-form]").serialize (),
      encode: true,

      success: function (data)
      {
        var size = data.length;
        $("form[name=filter-form]") [0].reset ();
        $(".rm").remove ();
        console.log ("Package sent");
        console.log ("Dataset:");
        console.log (data);
        var newRows = "";
        var tableTiles = "<tr id = 'table-titles' class = 'rm'><td>Identifier</td><td>Name</td><td>Last name</td><td>Option</td></tr>";

        for (var i = 0; i < size; i ++)
        {
          newRows += "<tr class = 'rm'>";
          newRows += "<td>" + data [i].identifier + "</td>";
          newRows += "<td>" + data [i].name + "</td>";
          newRows += "<td>" + data [i].lastName + "</td>";
          newRows += "<td><a id = '" + data [i].identifier + "' href = '#'>Update</a></td>";
          newRows += "</tr>";
        }

        $("#table-read").prepend (newRows);
        $(".rm").css ("display", "none");
        $(".rm").fadeIn (300);
        $("#table-read").prepend (tableTiles);
      },

      error: function (data)
      {
        console.log ("Package unsent");
        console.log (data);
      }
    });

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
          ($("input[name=last-name]").val () == null || $("input[name=last-name]").val () == "")
        )
        {
          alert ("All filters are empty.");
        }
        else
        {
          $.ajax
          ({
            type: "post",
            url: "../controllers/read-specific-author.php",
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
                var tableTiles = "<tr id = 'table-titles' class = 'rm'><td>Identifier</td><td>Name</td><td>Last name</td><td>Option</td></tr>";

                for (var i = 0; i < size; i ++)
                {
                  newRows += "<tr class = 'rm'>";
                  newRows += "<td>" + data [i].identifier + "</td>";
                  newRows += "<td>" + data [i].name + "</td>";
                  newRows += "<td>" + data [i].lastName + "</td>";
                  newRows += "<td><a id = '" + data [i].identifier + "' href = '#'>Update</a></td>";
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
