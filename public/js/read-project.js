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
      /*$("#filters-title").slideDown
        (
          300, function ()
          {
            $("#filters").slideDown
            (
              300, function ()
              {
                $("#open-filters").slideUp (300);
              }
            );
          }
        );*/
      }
    );

    $("input[name=back-to-table]").click
    (
      function ()
      {
        $("#table-read tr").fadeIn (300);
        $("#button-filters").fadeOut (300);
        $("#filters-title").fadeOut (300);
        $("#filters").fadeOut (300);
      }
    );
  }
);
