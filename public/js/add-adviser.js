$(document).ready
(
  function ()
  {
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
            url: "../controllers/add-adviser.php",
            data: $("form[name=add-adviser-form]").serialize (),
            encode: true,

            success: function (data)
            {
              console.log ("Package sent");
              console.log (data);
              $("form[name=add-adviser-form]") [0].reset ();
              alert ("Adviser added.");
              $(".container").slideUp
              (
                500, function ()
                {
                  window.location.href = "../views/add-adviser.php";
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
