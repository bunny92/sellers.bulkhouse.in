<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bulkhouse Seller Portal</title>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link href="<?= base_url("css/custom.css") ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="<?= base_url("css/font-awesome.min.css") ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                          
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive  hidden-xs" style="width:70%;line-height: 30px; height: 30px; margin-top: -7px;">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive hidden-sm hidden-md hidden-lg" style="width:85%; margin-top: -10px;">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url("dashboard") ?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Vendors</a></li>
                        <li><a href="<?= base_url("agents") ?>"><span class="fa fa-user"></span>&nbsp;&nbsp;Agents</a></li>
<!--                        <li><a href="<?= base_url("statistics") ?>"><span class="fa fa-line-chart"></span>&nbsp;&nbsp;Statistics</a></li>-->
                        <li ><a href="<?= base_url("quicklook") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Quick Look</a></li>
                        <li class="active"><a href="<?= base_url("completelook") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Complete Look</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>&nbsp;&nbsp; Profile<span class="caret"></span></a>
                            <ul class="dropdown-menu">
<!--                                <li><a href="#">Change Password</a></li>
                                <li role="separator" class="divider"></li>-->
                                <li><a href="<?= base_url("admin/logout")?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul> 
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <main>
            <div class="container">
                <br/>
                <div class="row">
                    <span class="page-title">Complete Look</span>
                    <br/>
                    <p class="sub-title-page">
                        This page gives you all set of credentials entered by Vendors.
                    </p>
                </div>
            </div>
            <br/>
            <center>
                <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Registered Date</th>
                                    <th>Company Details</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Firm Type</th>
                                    <th>Registration Category</th>
                                    <th>Contact Address</th>
                                    <th>Contact City</th>
                                    <th>Contact District</th>
                                    <th>Contact State</th>
                                    <th>Contact Pincode</th>
                                    <th>Dispatch Address</th>
                                    <th>Dispatch City</th>
                                    <th>Dispatch District</th>
                                    <th>Dispatch State</th>
                                    <th>Dispatch Pincode</th>
                                    <th>Year[Establishment]</th>
                                    <th>Employees</th>
                                    <th>Turn Over</th>
                                    <th>Certificate</th>
                                    <th>Contact Person</th>
                                    <th>Contact Email</th>
                                    <th>Contact Phone</th>
                                    <th>Photo ID Status</th>
                                    <th>VAT/CST Status</th>
                                    <th>PAN STATUS</th>
                                    <th>Company PAN Status</th>
                                    <th>CHEQUE Status</th>
                                    <th>Bank Status</th>
                                    <th>Agent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($look !== NULL) {
                                    $index = 0;
                                    foreach ($look as $value) {
                                        ?>
                                        <tr>
                                            <td><?= ++$index ?></td>
                                            <td><?= date("d-m-Y", strtotime($value->regdate))?></td>
                                            <td><?= $value->company ?></td>
                                               <td><?= $value->first_name ?> &nbsp; <?= $value->last_name ?></td>
                                               <td><?= $value->email ?>

                                            </td>
                                            <td><?= $value->phone?></td>
                                            <td>
                                                <?= $value->firm_type ?>
                                            </td>
                                            <td><?= $value->registration_category !== NULL ? $value->registration_category : "Due" ?></td>
                                            <td><?php
                                                if ($value->contact_address !== NULL) {
                                                    ?> 
                                                    Landline : <?= $value->contact_office_landline ?>
                                                    Address : <?= $value->contact_address ?> <br/>
                                                    Area : <?= $value->contact_area ?> <br/>

                                                    <?php
                                                } else {
                                                    echo "Due";
                                                }
                                                ?></td>
                                            <td><?= $value->contact_city !== NULL ? $value->contact_city : "Due" ?></td>
                                            <td><?= $value->contact_district !== NULL ? $value->contact_district : "Due" ?></td>
                                            <td><?= $value->contact_state !== NULL ? $value->contact_state : "Due" ?></td>
                                            <td><?= $value->contact_pincode !== NULL ? $value->contact_pincode : "Due" ?></td>
                                            <td><?php
                                                if ($value->disp_office_address !== NULL) {
                                                    ?> 
                                                    Landline : <?= $value->disp_office_landline ?>
                                                    Address : <?= $value->disp_office_address ?> <br/>
                                                    Area : <?= $value->disp_area ?> <br/>

                                                    <?php
                                                } else {
                                                    echo "Due";
                                                }
                                                ?></td>
                                            <td><?= $value->disp_city !== NULL ? $value->disp_city : "Due" ?></td>
                                            <td><?= $value->disp_district !== NULL ? $value->disp_district : "Due" ?></td>
                                            <td><?= $value->disp_state !== NULL ? $value->disp_state : "Due" ?></td>
                                            <td><?= $value->disp_pincode !== NULL ? $value->disp_pincode : "Due" ?></td>
                                            <td><?= $value->year !== NULL ? $value->year : "Due" ?></td>
                                            <td><?= $value->no_of_employees !== NULL ? $value->no_of_employees : "Due" ?></td>
                                            <td><?= $value->turn_over !== NULL ? $value->turn_over : "Due" ?></td>
                                            <td><?= $value->certificate !== NULL ? $value->certificate : "Due" ?></td>
                                            <td><?= $value->contact_person !== NULL ? $value->contact_person : "Due" ?></td>
                                            <td><?= $value->contact_email !== NULL ? $value->contact_email : "Due" ?></td>
                                            <td><?= $value->contact_phone !== NULL ? $value->contact_phone : "Due" ?></td>
                                            <td>
                                                <?php
                                                if ($value->firm == 1) {
                                                    ?> 
                                                <?= $value->prop_photo !== NULL ? ($value->prop_photo == "N/A" ? "Due" : $value->prop_photo) : "Due"?>
                                                    <?php
                                                } else if ($value->firm ==2) {
                                                    ?>
                                                <?= $value->partner_photo !== NULL ? ($value->partner_photo == "N/A" ? "Due" : $value->partner_photo) : "Due"?>
                                                    <?php
                                                } else if ($value->firm ==3) {
                                                    ?>
                                                <?= $value->private_photo !== NULL ? ($value->private_photo == "N/A" ? "Due" : $value->private_photo) : "Due"?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->firm == 1) {
                                                    ?> 
                                                <?= $value->prop_vat!== NULL ? ($value->prop_vat == "N/A" ? "Due" : $value->prop_vat): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==2) {
                                                    ?>
                                                <?= $value->partner_vat!== NULL ? ($value->partner_vat == "N/A" ? "Due" : $value->partner_vat): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==3) {
                                                    ?>
                                                <?= $value->private_vat!== NULL ? ($value->private_vat == "N/A" ? "Due" : $value->private_vat): "Due"?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->firm == 1) {
                                                    ?> 
                                                <?= $value->prop_pan!== NULL ? ($value->prop_pan == "N/A" ? "Due" : $value->prop_pan): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==2) {
                                                    ?>
                                                <span style ="color:red">Not Applicable</span>
                                                    <?php
                                                } else if ($value->firm ==3) {
                                                    ?>
                                                <span style ="color:red">Not Applicable</span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->firm == 1) {
                                                    ?> 
                                                <span style ="color:red">Not Applicable</span>
                                                    <?php
                                                } else if ($value->firm ==2) {
                                                    ?>
                                                <?= $value->partner_pan!== NULL ? ($value->partner_pan == "N/A" ? "Due" : $value->partner_pan): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==3) {
                                                    ?>
                                                <?= $value->private_pan !== NULL ? ($value->private_pan == "N/A" ? "Due" : $value->private_pan): "Due"?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                             <td>
                                                <?php
                                                if ($value->firm == 1) {
                                                    ?> 
                                                 <?= $value->prop_cancel!== NULL ? ($value->prop_cancel == "N/A" ? "Due" : $value->prop_cancel): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==2) {
                                                    ?>
                                                 <?= $value->partner_cancel!== NULL ? ($value->partner_cancel == "N/A" ? "Due" : $value->partner_cancel): "Due"?>
                                                    <?php
                                                } else if ($value->firm ==3) {
                                                    ?>
                                                 <?= $value->private_cancel!== NULL ? ($value->private_cancel == "N/A" ? "Due" : $value->private_cancel): "Due"?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $value->bank_status !== NULL ? $value->bank_status : "Due"?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($value->agent_code !== NULL) {
                                                        ?>
                                                        <?= $value->name?> &nbsp; [<?= $value->agent_code?>]
                                                         <?php
                                                    } else {
                                                        echo "Not Assigned";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </center>
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
        <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.colVis.min.js" type = "text/javascript"></script>

        <script>
            $(document).ready(function () {
                $("#myTable tr").each(function (key, value) {
                    $(this).find("td").each(function(key, value){
                        var value = $(this).html().trim();
                        if(value == "Due") {
                            $(this).css({"background-color" : "#ffab00", "color" : "white"});
                        } 
                        if(value == "Approved") {
                            $(this).css({"background-color" : "#7cb342", "color" : "white"});
                        }
                        if(value == "Rejected") {
                            $(this).css({"background-color" : "#d84315", "color" : "white"});
                        }
                        if(value == "Verification In Process") {
                            $(this).css({"background-color" : "#8d6e63", "color" : "white"});
                        }
                    });
                });
                $('#myTable').DataTable({
                    "scrollX": true,
                    "sScrollX": "100%",
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    buttons: [
                        'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' 
                    ]
                });
            });
        </script>
    </body>
</html>