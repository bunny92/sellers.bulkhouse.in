$(document).ready(function () {
    $("#register_category").blur(function () {
        $("#reg_cat_error").html("");
        var register_category = $("#register_category").val();
        if (register_category === "no") {
            $("#reg_cat_error").html("Please select Your Category");
            $("#register_category").focus();
        }
    });
    $("#cont_off_land").keyup(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_off_land").val($("#cont_off_land").val());
        }
    });
    $("#cont_off_land").blur(function () {
        $("#cont_off_land_error").html("");
        var cont_off_land = $("#cont_off_land").val();
        if (cont_off_land.trim().length > 0) {
            if (isNaN(cont_off_land)) {
                $("#cont_off_land_error").html("Office Landline should only contain numbers");
            } else {
                if (cont_off_land.trim().length >= 10 && cont_off_land.length <= 12) {
                } else {
                    $("#cont_off_land_error").html("Office Landline should be between 10 to 12 digits");
                }

            }
        } else {
            $("#cont_off_land_error").html("Office Landline cannot be empty");
        }
    });
     $("#cont_address").keyup(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_address").val($("#cont_address").val());
        }
    });
    
    $("#cont_address").blur(function () {
        $("#cont_address_error").html("");
        var cont_address = $("#cont_address").val();
        if (cont_address.trim().length < 10) {
            $("#cont_address_error").html("Address should have at least 10 characters");

        }
    });
    
    $("#cont_area").keyup(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_area").val($("#cont_area").val());
        }
    });


    $("#cont_area").blur(function () {
        $("#cont_area_error").html("");
        var cont_area = $("#cont_area").val();
        if (cont_area.trim().length < 3) {
            $("#cont_area_error").html("Area should have at least 3 characters");

        }


    });
    
     $("#cont_state").change(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_state").val($("#cont_state").val());
        }
    });

    $("#cont_state").blur(function () {
        $("#cont_state_error").html("");

        var cont_state = $("#cont_state").val();
        if (cont_state === "Select State") {
            $("#cont_state_error").html("Please Select State");
            flag = false;
        }


    });
    
    $("#cont_city").keyup(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_city").val($("#cont_city").val());
        }
    });

    $("#cont_city").blur(function () {
        $("#cont_city_error").html("");
        var cont_city = $("#cont_city").val();
        var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
        if (cont_city.trim().length < 3) {
            $("#cont_city_error").html("Area should have at least 3 characters");
        } else {
            if (!regex.test(cont_city)) {
                $("#cont_city_error").html("Area should have only characters");
            }
        }
    });

    $("#cont_district").blur(function () {
        $("#cont_district_error").html("");

        var cont_district = $("#cont_district").val();
        if (cont_district === "no") {
            $("#cont_district_error").html("Please Select District");
        }


    });
    
    $("#cont_pincode").keyup(function () {
        if(document.getElementById("test5").checked) {
            $("#disp_pincode").val($("#cont_pincode").val());
        }
    });

    $("#cont_pincode").blur(function () {

        $("#cont_pincode_error").html("");

        var cont_pincode = $("#cont_pincode").val();
        var pin_regex = /^\d{6}$/;
        if (!pin_regex.test(cont_pincode)) {
            $("#cont_pincode_error").html("Pincode should have 6 digits");
        }
    });


    $("#disp_off_land").blur(function () {
        $("#disp_off_land_error").html("");
        var disp_off_land = $("#disp_off_land").val();
        if (disp_off_land.trim().length > 0) {
            if (isNaN(disp_off_land)) {

                $("#disp_off_land_error").html("Office Landline should only contain numbers");
            } else {
                if (disp_off_land.trim().length >= 10 && disp_off_land.length <= 12) {

                } else {
                    $("#disp_off_land_error").html("Office Landline should be between 10 to 12 digits");
                }

            }
        } else {
            $("#disp_off_land_error").html("Office Landline cannot be empty");
        }


    });


    $("#disp_address").blur(function () {
        $("#disp_address_error").html("");
        var disp_address = $("#disp_address").val();
        if (disp_address.trim().length < 10) {
            $("#disp_address_error").html("Address should have at least 10 characters");
        }

    });

    $("#disp_area").blur(function () {
        $("#disp_area_error").html("");
        var disp_area = $("#disp_area").val();
        if (disp_area.trim().length < 10) {
            $("#disp_area_error").html("Area should have at least 10 characters");
        }


    });

    $("#disp_city").blur(function () {
        $("#disp_city_error").html("");
        var disp_city = $("#disp_city").val();
        if (disp_city.trim().length < 3) {
            $("#disp_city_error").html("Area should have at least 3 characters");
        }


    });

    $("#disp_state").blur(function () {
        $("#disp_state_error").html("");
        var disp_state = $("#disp_state").val();
        if (disp_state === "Select State") {
            $("#disp_state_error").html("Please Select State");

        }

    });
    $("#disp_district").blur(function () {
        $("#disp_district_error").html("");
        var disp_district = $("#disp_district").val();

        if (disp_district === "no") {
            $("#disp_district_error").html("Please Select District");

        }

    });

    $("#disp_pincode").blur(function () {
        $("#disp_pincode_error").html("");
        var disp_pincode = $("#disp_pincode").val();

        var pin_regex = /^\d{6}$/;
        if (!pin_regex.test(disp_pincode)) {
            $("#disp_pincode_error").html("Pincode should have 6 digits");
        }
    });
}); 