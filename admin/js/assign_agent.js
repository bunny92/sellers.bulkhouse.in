function assign_agent_to_vendor(id, email) {
    $("#vendor_id").val(id);
    $("#vendor_email").val(email);
}

function validate_assign() {
    $("#assign_error").html("");
    var flag = true;
    var agent_code = $("#agent").val();
    if (agent_code == "no") {
        $("#assign_error").html("Please select agent");
        flag = false;
    }
    return flag;
}

function getContent(id, url) {
    
    $("#input_id").html("<div class = 'container'>" + id + "<br/><br/></div>");
    var type = url.substring(url.lastIndexOf(".") + 1);
    if (type == "pdf") {
        var base_url = "http://sellers.bulkhouse.in/admin/documents/get_document?pic=";
        $("#content").html('<div class = "container"><iframe src="' + base_url + "" + url + '" width="800px" height="400px"></iframe></div>');
    } else {
        $("#content").html("<div class = 'container'><img src = '"+url+"' class = 'img-responsive' style = 'width:70%'/></div>");
    }


}