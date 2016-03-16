$(document).ready
(
  function ()
  {
    var menuCreateState = false;

    $("#create").click
    (
      function ()
      {
        if (!menuCreateState)
        {
          $("#container-create").fadeIn
          (
            500, function ()
            {
              $("#link-to-investigation-line-create").fadeIn
              (
                300, function ()
                {
                  $("#link-to-author-create").fadeIn
                  (
                    300, function ()
                    {
                      $("#link-to-adviser-create").fadeIn
                      (
                        300, function ()
                        {
                          $("#link-to-project-create").fadeIn (300);
                        }
                      );
                    }
                  );
                }
              );
            }
          );

          var scrollPosition = $("#container-create").offset ().top;

          $("html, body").animate
          (
            {
              scrollTop: scrollPosition
            }, 2000
          );

          menuCreateState = true;
        }
        else
        {
          $("#container-create").fadeOut
          (
            300, function ()
            {
                $("#link-to-project-create").css ("display", "none");
                $("#link-to-adviser-create").css ("display", "none");
                $("#link-to-author-create").css ("display", "none");
                $("#link-to-investigation-line-create").css ("display", "none");
            }
          );

          menuCreateState = false;
        }
      }
    );

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
          400, function ()
          {
            $("#link-to-read").fadeIn
            (
              400, function ()
              {
                $("#link-to-update").fadeIn
                (
                  400, function ()
                  {
                    $("#link-to-delete").fadeIn (400);
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
