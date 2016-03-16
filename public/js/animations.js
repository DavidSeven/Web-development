$(document).ready
(
  function ()
  {
    var menuCreateState = false;
    var menuReadState = false;

    $("#create").click
    (
      function ()
      {
        if (!menuCreateState)
        {
          if (menuReadState)
          {
            $("#link-to-project-read").css ("display", "none");
            $("#link-to-adviser-read").css ("display", "none");
            $("#link-to-author-read").css ("display", "none");
            $("#link-to-investigation-line-read").css ("display", "none");
            $("#container-read").css ("display", "none");
            menuReadState = false;
          }

          $("#h1-title").fadeOut
          (
            200, function ()
            {
              $("#h1-title").html ("Menu create");
              $("#h1-title").fadeIn (200);
            }
          );

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

          $("#h1-title").fadeOut
          (
            200, function ()
            {
              $("#h1-title").html ("Degree works");
              $("#h1-title").fadeIn (200);
            }
          );

          menuCreateState = false;
        }
      }
    );

    $("#read").click
    (
      function ()
      {
        if (!menuReadState)
        {
          if (menuCreateState)
          {
            $("#link-to-project-create").css ("display", "none");
            $("#link-to-adviser-create").css ("display", "none");
            $("#link-to-author-create").css ("display", "none");
            $("#link-to-investigation-line-create").css ("display", "none");
            $("#container-create").css ("display", "none");
            menuCreateState = false;
          }

          $("#h1-title").fadeOut
          (
            200, function ()
            {
              $("#h1-title").html ("Menu read");
              $("#h1-title").fadeIn (200);
            }
          );

          $("#container-read").fadeIn
          (
            500, function ()
            {
              $("#link-to-investigation-line-read").fadeIn
              (
                300, function ()
                {
                  $("#link-to-author-read").fadeIn
                  (
                    300, function ()
                    {
                      $("#link-to-adviser-read").fadeIn
                      (
                        300, function ()
                        {
                          $("#link-to-project-read").fadeIn (300);
                        }
                      );
                    }
                  );
                }
              );
            }
          );

          var scrollPosition = $("#container-read").offset ().top;

          $("html, body").animate
          (
            {
              scrollTop: scrollPosition
            }, 2000
          );

          menuReadState = true;
        }
        else
        {
          $("#container-read").fadeOut
          (
            300, function ()
            {
                $("#link-to-project-read").css ("display", "none");
                $("#link-to-adviser-read").css ("display", "none");
                $("#link-to-author-read").css ("display", "none");
                $("#link-to-investigation-line-read").css ("display", "none");
            }
          );

          $("#h1-title").fadeOut
          (
            200, function ()
            {
              $("#h1-title").html ("Degree works");
              $("#h1-title").fadeIn (200);
            }
          );

          menuReadState = false;
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
