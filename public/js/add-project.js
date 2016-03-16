$(document).ready
(
  function ()
  {
    $("form[name=add-project-form]").submit
    (
      function (event)
      {
        if ($("#authorsSelect option:selected").length <= 3 && $("#authorsSelect option:selected").length >= 1 && $("select[name=advisers]").val () != 0)
        {
          $.ajax
          ({
            type: "post",
            url: "../controllers/add-project.php",
            data: $("form[name=add-project-form]").serialize (),
            encode: true,
            success: function (data)
            {
              console.log ("Package sent");
              console.log (data);
              $("form[name=add-project-form]") [0].reset ();
              alert ("Project added.");
              $(".container").slideUp
              (
                500, function ()
                {
                  window.location.href = "../views/add-project.php";
                }
              );
            },
            error: function (data)
            {
              console.log ("Package unsent");
            }
          });
        }
        else
        {
            if ($("#authorsSelect option:selected").length > 3 || $("#authorsSelect option:selected").length < 1)
            {
              for(i = 0; i < 3; i ++)
              {
                $("#authorsSelect").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }
            if ($("select[name=advisers]").val () == 0)
            {              
              for(i = 0; i < 3; i ++)
              {
                $("select[name=advisers]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }
        }

        event.preventDefault ();
      }
    );

    $("input[name=back-2]").click
    (
      function ()
      {
        $("#project-2").fadeOut
        (
          500, function ()
          {
            $("#project-1").fadeIn (500);
          }
        );
      }
    );

    $("input[name=accept]").click
    (
      function ()
      {
        if ($("input[name=name]").val () != null && $("input[name=name]").val () != "" &&
        $("select[name=investigationLine]").val () != 0)
        {
          $("#project-1").fadeOut
          (
            500, function ()
            {
              $("#project-2").fadeIn (500);
            }
          );
        }
        else
        {
          if ($("input[name=name]").val () == null || $("input[name=name]").val () == "")
          {
            for(i = 0; i < 3; i ++)
            {
              $("input[name=name]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
            }
          }
          if ($("select[name=investigationLine]").val () == 0)
          {
            for(i = 0; i < 3; i ++)
            {
              $("select[name=investigationLine]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
            }
          }
        }
      }
    );
  }
);
