$(document).ready
(
  function ()
  {
    $("form[name=add-project-form]").submit
    (
      function (event)
      {
        event.preventDefault ();

        if ($("select[name=authors] option:selected").length <= 3 && $("select[name=authors] option:selected").length >= 1 && $("select[name=advisers]").val () != 0)
        {

        }
        else
        {
            if ($("select[name=authors] option:selected").length > 3 || $("select[name=authors] option:selected").length < 1)
            {
              alert ("Please, check this:\nMinimum: 1 authors\nMaximum: 3 authors\n");
              for(i = 0; i < 3; i ++)
              {
                $("select[name=authors]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }
            if ($("select[name=advisers]").val () == 0)
            {
              alert ("¡Choose an adviser!");
              for(i = 0; i < 3; i ++)
              {
                $("select[name=advisers]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
              }
            }
        }
      }
    );


    $("input[name=back-2]").click
    (
      function ()
      {
        $("#project-2").fadeOut
        (
          700, function ()
          {
            $("#project-1").fadeIn (700);
          }
        );
      }
    );

    $("input[name=accept]").click
    (
      function ()
      {
        if ($("input[name=name]").val () != null && $("input[name=name]").val () != "" &&
        $("input[name=investigationLine]").val () != null && $("input[name=investigationLine]").val () != "")
        {
          $("#project-1").fadeOut
          (
            700, function ()
            {
              $("#project-2").fadeIn (700);
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
          if ($("input[name=investigationLine]").val () == null || $("input[name=investigationLine]").val () == "")
          {
            for(i = 0; i < 3; i ++)
            {
              $("input[name=investigationLine]").fadeTo ('slow', 0.1).fadeTo ('slow', 1.0);
            }
          }
        }
      }
    );
  }
);
