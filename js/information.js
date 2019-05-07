
function validateForm() {
    $("#email_error").html("");
    $("#phone_error").html("");
    $("#transaction_error").html("");
    $("#verification_error").html("");
    var email_regex  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var phone_regex = /^\d{10}$/;
    var flag = true;
    var email_val = $("#email").val();
    var phone_val = $("#phone").val();
    var transaction_val = $("#transaction").val();
    var verification = $("#verification").val();
    if(!email_regex.test(email_val)) {
        flag = false;
        $("#email_error").html("Please enter valid email-id");
    }
    if(!phone_regex.test(phone_val)) {
        flag = false;
        $("#phone_error").html("Phone Number should contain 10 numbers");
    }
    if(transaction_val === "no") {
        flag= false;
        $("#transaction_error").html("Please choose your Market");
    }
    if(verification !== $("#captchaValue").html().trim()) {
        flag = false;
        $("#verification_error").html("Verification code is incorrect, Please re-enter");
    }
    return flag;

}
