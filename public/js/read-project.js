$(document).ready
(
  function ()
  {
    $("input[name=filter]").click
    (
      function ()
      {
        $("#table-read tr").slideUp
        (
          300, function ()
          {
            $("#table-titles").slideDown
            (
              300, function ()
              {
                $("#filters-title").slideDown
                (
                  300, function ()
                  {
                    $("#filters").slideDown (
                      300, function ()
                      {
                        $("#button-filters").slideDown (300);
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
        $("#filters-title").slideUp
        (
      }
    );
  }
);
