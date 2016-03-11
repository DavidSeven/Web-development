$(document).ready
(
  function ()
  {
    $("header").css
    (
      {
        "background-color": "#2c3e50"
      }
    );

    $("#h1-title").slideDown
    (
      2000, function ()
      {
        $("#link-to-create").fadeIn
        (
          500, function ()
          {
            $("#link-to-read").fadeIn
            (
              500, function ()
              {
                $("#link-to-update").fadeIn
                (
                  500, function ()
                  {
                    $("#link-to-delete").fadeIn (500);
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
