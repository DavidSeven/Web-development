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
              $("form[name=filter-form]") [0].reset ();
              console.log ("Package sent");
              //console.log ("Dataset:\n" + data [1].identifier + "\n" + data [0].name + "\n" + data [0].investigationLine + "\n" + data [0].calification + "\n" + data [0].addedDate + "\n" + data [0].quota + "\n" + data [0].adviserName);
              console.log (data);
              console.log (data.hola);
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
