$(document).ready(function() {
  $("#company").blur(function() {
      $("#company_error").html("");
    var company = $("#company").val();
    if (company.trim().length < 3) {
        $("#company_error").html("Company Name should have at least 3 characters");
    }

  });

  $("#first_name").blur(function() {
      $("#first_name_error").html("");
    var first_name = $("#first_name").val();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (first_name.trim().length < 3) {
        $("#first_name_error").html("First Name should have at least 3 characters");
    } else {
        if (!regex.test(first_name)) {
            $("#first_name_error").html("First Name should have only characters");
        }
    }


  });

  $("#last_name").blur(function() {
      $("#last_name_error").html("");
    var last_name = $("#last_name").val();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (last_name.trim().length === 0) {
        $("#last_name_error").html("Last Name cannot be empty");
    } else {
        if (!regex.test(last_name)) {
            $("#last_name_error").html("Last Name should have only characters");

        }
    }

  });

  $("#password").blur(function() {
      $("#password_error").html("");
  var password = $("#password").val();
  if (password.length < 7) {
      $("#password_error").html("Password should have at least 7 characters");

  }


  });
  $("#confirm_password").blur(function() {
      $("#confirm_password_error").html("");
  var confirm_password = $("#confirm_password").val();
    var password = $("#password").val();
  if (confirm_password !== password) {
      $("#confirm_password_error").html("The confirmation password does not match the password");

  }


  });
  $("#pincode").blur(function() {
      $("#pincode_error").html("");
  var pincode = $("#pincode").val();
  var pin_regex = /^\d{6}$/;
  if (!pin_regex.test(pincode)) {
      $("#pincode_error").html("Pincode should have 6 digits");

  }
  });

  $("#firms").blur(function() {
      $("#firm_error").html("");
  var firm_type = $("#firms").val();
  if (firm_type === "no") {

      $("#firm_error").html("Please choose firm type");
  }
  });
});



function validateForm() {
    var company = $("#company").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var password = $("#password").val();
    var confirm_password = $("#confirm_password").val();
    var pincode = $("#pincode").val();
    var firm_type = $("#firms").val();
    var flag = true;
    $("#company_error").html("");
    $("#first_name_error").html("");
    $("#last_name_error").html("");
    $("#password_error").html("");
    $("#confirm_error").html("");
    $("#pincode_error").html("");
    $("#firm_error").html("");

    if (firm_type === "no") {
        flag = false;
        $("#firm_error").html("Please choose firm type");
    }

    if (company.trim().length < 3) {
        $("#company_error").html("Company Name should have at least 3 characters");
        flag = false;
    }
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (first_name.trim().length < 3) {
        $("#first_name_error").html("First Name should have at least 3 characters");
        flag = false;
    } else {
        if (!regex.test(first_name)) {
            $("#first_name_error").html("First Name should have only characters");
            flag = false;
        }
    }



    if (last_name.trim().length === 0) {
        $("#last_name_error").html("Last Name cannot be empty");
        flag = false;
    } else {
        if (!regex.test(last_name)) {
            $("#last_name_error").html("Last Name should have only characters");
            flag = false;
        }
    }

    if (password.length < 7) {
        $("#password_error").html("Password should have at least 7 characters");
        flag = false;
    }

    if (confirm_password !== password) {
        $("#confirm_password_error").html("The confirmation password does not match the password");
        flag = false;
    }
    var pin_regex = /^\d{6}$/;
    if (!pin_regex.test(pincode)) {
        $("#pincode_error").html("Pincode should have 6 digits");
        flag = false;
    }



    return flag;
}
