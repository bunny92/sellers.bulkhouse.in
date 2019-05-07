function validateBusinessProfile() {
    clearBusinessProfileError();
    var flag = true;
    var register_category = $("#register_category").val();
    var cont_off_land = $("#cont_off_land").val();
    var cont_address = $("#cont_address").val();
    var cont_area = $("#cont_area").val();
    var cont_state = $("#cont_state").val();
    var cont_city = $("#cont_city").val();
    var cont_district = $("#cont_district").val();
    var cont_pincode = $("#cont_pincode").val();
    var disp_off_land = $("#disp_off_land").val();
    var disp_address = $("#disp_address").val();
    var disp_area = $("#disp_area").val();
    var disp_city = $("#disp_city").val();
    var disp_state = $("#disp_state").val();
    var disp_district = $("#disp_district").val();
    var disp_pincode = $("#disp_pincode").val();
    var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;

    if (register_category === "no") {
        $("#reg_cat_error").html("Please select Your Category");
        $("#register_category").focus();
        flag = false;
    }

    if (cont_off_land.trim().length > 0) {
        if (isNaN(cont_off_land)) {

            flag = false;
            $("#cont_off_land_error").html("Office Landline should only contain numbers");

        } else {
            if (cont_off_land.trim().length >= 10 && cont_off_land.length <= 12) {

            } else {
                flag = false;
                $("#cont_off_land_error").html("Office Landline should be between 10 to 12 digits");
            }

        }
    } else {
        $("#cont_off_land_error").html("Office Landline cannot be empty");
        flag = false;
    }

    if (cont_address.trim().length < 10) {
        $("#cont_address_error").html("Address should have at least 10 characters");
        flag = false;
    }
    if (cont_area.trim().length < 3) {
        $("#cont_area_error").html("Area should have at least 3 characters");
        flag = false;
    }

    if (cont_city.trim().length < 3) {
        $("#cont_city_error").html("Area should have at least 3 characters");
        flag = false;
    } else {
      if(!regex.test(cont_city)) {
        $("#cont_city_error").html("Area should have only characters");
        flag = false;
      }
    }

    if (cont_state === "Select State") {
        $("#cont_state_error").html("Please Select State");
        flag = false;
    }

    if (cont_district === "no") {
        $("#cont_district_error").html("Please Select District");
        flag = false;
    }

    var pin_regex = /^\d{6}$/;
    if (!pin_regex.test(cont_pincode)) {
        $("#cont_pincode_error").html("Pincode should have 6 digits");
        flag = false;
    }


    if (disp_off_land.trim().length > 0) {
        if (isNaN(disp_off_land)) {

            flag = false;
            $("#disp_off_land_error").html("Office Landline should only contain numbers");
        } else {
            if (disp_off_land.trim().length >= 10 && disp_off_land.length <= 12) {

            } else {
                flag = false;
                $("#disp_off_land_error").html("Office Landline should be between 10 to 12 digits");
            }

        }
    } else {
        $("#disp_off_land_error").html("Office Landline cannot be empty");
        flag = false;
    }

    if (disp_address.trim().length < 10) {
        $("#disp_address_error").html("Address should have at least 10 characters");
        flag = false;
    }
    if (disp_area.trim().length < 10) {
        $("#disp_area_error").html("Area should have at least 10 characters");
        flag = false;
    }

    if (disp_city.trim().length < 3) {
        $("#disp_city_error").html("Area should have at least 3 characters");
        flag = false;
    }

    if (disp_state === "Select State") {
        $("#disp_state_error").html("Please Select State");
        flag = false;
    }

    if (disp_district === "no") {
        $("#disp_district_error").html("Please Select District");
        flag = false;
    }

    var pin_regex = /^\d{6}$/;
    if (!pin_regex.test(disp_pincode)) {
        $("#disp_pincode_error").html("Pincode should have 6 digits");
        flag = false;
    }


    return flag;
}

function clearBusinessProfileError() {
    $("#reg_cat_error").html("");
    $("#cont_off_land_error").html("");
    $("#cont_address_error").html("");
    $("#cont_area_error").html("");
    $("#cont_city_error").html("");
    $("#cont_state_error").html("");
    $("#cont_district_error").html("");
    $("#cont_pincode_error").html("");
    $("#disp_off_land_error").html("");
    $("#disp_address_error").html("");
    $("#disp_area_error").html("");
    $("#disp_city_error").html("");
    $("#disp_state_error").html("");
    $("#disp_district_error").html("");
    $("#disp_pincode_error").html("");

}

function pasteDetails() {
    if (document.getElementById("test5").checked) {
        $("#disp_off_land").val($("#cont_off_land").val());
        $("#disp_address").val($("#cont_address").val());
        $("#disp_area").val($("#cont_area").val());
        $("#disp_city").val($("#cont_city").val());
        $("#disp_state").val($("#cont_state").val());
        $("#disp_district").val($("#cont_district").val());
        $("#disp_pincode").val($("#cont_pincode").val());
    } else {
        $("#disp_off_land").val("");
        $("#disp_address").val("");
        $("#disp_area").val("");
        $("#disp_city").val("");
        $("#disp_state").val("Select State");
        $("#disp_district").val("no");
        $("#disp_pincode").val("");

    }
}
