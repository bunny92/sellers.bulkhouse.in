$(document).ready(function() {
  $("#account_name").blur(function() {
      $("#account_name_error").html("");
    var account_name = $("#account_name").val();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (account_name.trim().length < 6) {

        $("#account_name_error").html("Account name should have at least 6 characters");
    } else {
        if (!regex.test(account_name)) {
            $("#account_name_error").html("Account name should have only characters");

        }
    }

  });

  $("#account_name").blur(function() {
      $("#account_number_error").html("");
  var account_number = $("#account_number").val();
  if (isNaN(account_number)) {
    
      $("#account_number_error").html("Account Number should have numbers ");
  } else {
      if (account_number.trim().length < 5) {

          $("#account_number_error").html("Account Number should have at least 5 numbers");
      }
  }


  });

  $("#bank_name").blur(function() {
      $("#bank_name_error").html("");
  var bank_name = $("#bank_name").val();
  if (bank_name.trim().length < 3) {

      $("#bank_name_error").html("Bank Name should have at least 3 characters");
  }



  });

  $("#branch_name").blur(function() {
      $("#branch_name_error").html("");
      var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
  var branch_name = $("#branch_name").val();
  if (branch_name.trim().length < 3) {

      $("#branch_name_error").html("Branch Name should have at least 3 characters");
  } else {
      if (!regex.test(branch_name)) {
          $("#branch_name_error").html("Branch Name should have only characters");

      }
  }

  });

  $("#ifsc").blur(function() {
      $("#ifsc_error").html("");
  var ifsc = $("#ifsc").val();
  if (ifsc.trim().length < 11) {

      $("#ifsc_error").html("IFSC should have at least 11 characters");
  }
  });
});




function validate_bank_credentials() {

    var account_name = $("#account_name").val();
    var account_number = $("#account_number").val();
    var bank_name = $("#bank_name").val();
    var branch_name = $("#branch_name").val();
    var ifsc = $("#ifsc").val();
    var flag = true;
    clear_fields();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (account_name.trim().length < 6) {
        flag = false;
        $("#account_name_error").html("Account name should have at least 6 characters");
    } else {
        if (!regex.test(account_name)) {
            $("#account_name_error").html("Account name should have only characters");
            flag = false;
        }
    }

    if (isNaN(account_number)) {
        flag = false;
        $("#account_number_error").html("Account Number should have numbers ");
    } else {
        if (account_number.trim().length < 5) {
            flag = false;
            $("#account_number_error").html("Account Number should have at least 5 numbers");
        }
    }

    if (bank_name.trim().length < 3) {
        flag = false;
        $("#bank_name_error").html("Bank Name should have at least 3 characters");
    }

    if (branch_name.trim().length < 3) {
        flag = false;
        $("#branch_name_error").html("Branch Name should have at least 3 characters");
    } else {
        if (!regex.test(branch_name)) {
            $("#branch_name_error").html("Branch Name should have only characters");
            flag = false;
        }
    }

    if (ifsc.trim().length < 11) {
        flag = false;
        $("#ifsc_error").html("IFSC should have at least 11 characters");
    }


    return flag;

}

function clear_fields() {
    $("#account_name_error").html("");
    $("#account_number_error").html("");
    $("#bank_name_error").html("");
    $("#branch_name_error").html("");
    $("#ifsc_error").html("");
}
