$(document).ready
(
  function ()
  {
    $.ajax
    ({
      type: "post",
      url: "../controllers/pass-identifier.php",
      encode: true,

      success: function (data)
      {
        if (!isNaN (data.identifier) && data.identifier != null)
        {
          console.log ("Package sent");
          console.log (data);
          console.log ("Identifier:" + data.identifier);

          $.ajax
          ({
            type: "post",
            url: "../controllers/read-specific-author-to-update.php",
            data: {identifier: data.identifier},
            encode: true,

            success: function (data)
            {
              console.log ("Package sent");
              console.log (data);
              $("form[name=add-adviser-form]") [0].reset ();
              $("input[name=identifier]").val (data.identifier);
              $("input[name=name]").val (data.name);
              $("input[name=last-name]").val (data.lastName);
            },

            error: function (data)
            {
              console.log ("Package unsent");
              console.log (data);
            }
          });
        }
        else
        {
          console.log ("Nothing");
          window.location.href = "update-authors.php";
        }
      },

      error: function (data)
      {
        console.log ("Package unsent");
        console.log (data);
      }
    });

    $("form[name=add-adviser-form]").submit
    (
      function (event)
      {
        if (($("input[name=name]").val () != null && $("input[name=name]").val () != "") && ($("input[name=last-name]").val () != null &&
        $("input[name=last-name]").val () != ""))
        {
          $.ajax
          ({
            type: "post",
            url: "../controllers/apply-author-update.php",
            data: $("form[name=add-adviser-form]").serialize (),
            encode: true,

            success: function (data)
            {
              console.log ("Package sent");
              console.log (data);
              $("form[name=add-adviser-form]") [0].reset ();
              alert ("Author updated.");
              $(".container").slideUp
              (
                500, function ()
                {
                  window.location.href = "update-authors.php";
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
            if ($("input[name=name]").val () == null || $("input[name=name]").val () == "")
            {
              for(i = 0; i < 3; i ++)
              {
                $("input[name=name]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }

            if ($("input[name=last-name]").val () == null || $("input[name=last-name]").val () == "")
            {
              for(i = 0; i < 3; i ++)
              {
                $("input[name=last-name]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }
        }

        event.preventDefault ();
      }
    );
  }
);
