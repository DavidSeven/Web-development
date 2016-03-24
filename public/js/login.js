$(document).ready
(
  function ()
  {
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
              max: 20,
              message: "User name must be between 6 and 20 characters long. "
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
              max: 20,
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
