</div>
</div>
</main>










<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            "sScrollX": "100%",
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<script>
    function sendVerificationLink(email) {
        $.post("http://sellers.bulkhouse.in/register/send_activation_link", {email : email}, function(data) {
            var value = data.trim();
            if(value == "no") {
                alert("Not Sent try again..!");
            } else {
                alert("Mail Sent Successfully..!");
            }
        });
    }
    
    function get_manual_link(email) {
        $("#manual_link").html("");
        $.post("http://sellers.bulkhouse.in/register/get_manual_activation_link", {email : email}, function(data) {
            var value = data.trim();
            $("#manual_link").html("<textarea readonly = 'true' style = 'width:100%'>"+value+"</textarea>");
        });
    }
</script>
</body>
</html>