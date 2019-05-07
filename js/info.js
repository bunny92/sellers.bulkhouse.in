function validateInfo() {
    var flag = true;
    clearInfo();
    var year = $("#year").val();
    var no = $("#no").val();
    var turn_over = $("#turn_over").val();
    var certificate = $("#certificate").val();
    var contact_person = $("#contact_person").val();
    var contact_email = $("#contact_email").val();
    var contact_phone = $("#contact_phone").val();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
    var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var phone_regex = /^\d{10}$/;
    var year_regex = /^\d{4}$/;

    if (year.trim().length < 4 || !year_regex.test(year)) {
        flag = false;
        $("#year_error").html("Year should have four digits");
    } else {
        var d = new Date();
        var n = d.getFullYear();
        if (year > n) {
            flag = false;
            $("#year_error").html("Year should be less than current year");
        }
    }

    if (no === "no") {
        flag = false;
        $("#no_error").html("Please Choose No.of.Employees");
    }

    if (turn_over.trim().length === 0) {
        flag = false;
        $("#turn_over_error").html("Turn over cannot be empty");
    }

    if (isNaN(turn_over.trim())) {
        flag = false;
        $("#turn_over_error").html("Turn over should have digits");
    }

    if (certificate === "no") {
        flag = false;
        $("#certificate_error").html("Please select certificate");
    }

    if (contact_person.trim().length > 0) {
        if (!regex.test(contact_person)) {
            flag = false;
            $("#contact_person_error").html("Contact Person should have only characters");
        }
    }

    if (contact_email.trim().length > 0) {

        if (!email_regex.test(contact_email)) {
            flag = false;
            $("#contact_email_error").html("Please enter valid email address");
        }
    }
    if (contact_phone.trim().length > 0) {

        if (!phone_regex.test(contact_phone)) {
            flag = false;
            $("#contact_phone_error").html("Phone Number should  have 10 digits");
        }
    }
    return flag;
}

function clearInfo() {
    $("#year_error").html("");
    $("#no_error").html("");
    $("#turn_over_error").html("");
    $("#certificate_error").html("");
    $("#contact_person_error").html("");
    $("#contact_email_error").html("");
    $("#contact_phone_error").html("");
}

