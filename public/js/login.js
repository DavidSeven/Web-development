$(document).ready
(
  function ()
  {
    $("#registration-form").submit
    (
      function (event)
      {
        $.ajax
        ({
          type: "post",
          url: "../controllers/authentication.php",
          data: $("#registration-form").serialize (),
          encode: true,

          success: function (data)
          {
            console.log ("Package sent");
            console.log (data);

            if (data != null && data.isConnect == true)
            {
              window.location.href = "../public/index.php";
            }
            else
            {
              alert ("Invalid user");
            }
          },

          error: function (data)
          {
            console.log ("Package unsent");
            console.log (data);
          }
        });

        event.preventDefault ();
      }
    );

    var validator = $("#registration-form").bootstrapValidator
    ({
      fields:
      {
        user:
        {
          message: "User name is required. ",
          validators:
          {
            notEmpty:
            {
              message: "Please provide an user name. "
            },

            stringLength:
            {
              min: 6,
              max: 10,
              message: "User name must be between 6 and 10 characters long. "
            },

            regexp:
            {
              regexp: /^[A-Za-z0-9]*$/,
              message: 'The user name can consist of alphabetical characters only'
            }
          }
        },

        password:
        {
          message: "User password is required",
          validators:
          {
            notEmpty:
            {
              message: "Please provide an user password"
            },

            stringLength:
            {
              min: 6,
              max: 12,
              message: "User password must be between 6 and 12 characters long"
            }
          }
        }
      }
    });

    validator.on
    (
      "success.form.bv", function (e)
      {
        e.preventDefault ();
      }
    );
  }
);
