$(document).ready
(
  function ()
  {
    $("form[name=add-investigation-line-form]").submit
    (
      function (event)
      {
        if ($("input[name=name]").val () != null && $("input[name=name]").val () != "")
        {
          $.ajax
          ({
            type: "post",
            url: "../controllers/add-investigation-line.php",
            data: $("form[name=add-investigation-line-form]").serialize (),
            encode: true,

            success: function (data)
            {
              console.log ("Package sent");
              console.log (data);
              $("form[name=add-investigation-line-form]") [0].reset ();
              alert ("Investigation line added.");
              $(".container").slideUp
              (
                500, function ()
                {
                  window.location.href = "../views/add-investigation-line.php";
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
        }

        event.preventDefault ();
      }
    );
  }
);
