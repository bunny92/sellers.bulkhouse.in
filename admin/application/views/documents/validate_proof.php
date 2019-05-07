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
                        <li class="active"><a href="<?= base_url("documents") ?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Documents</a></li>
                        <li><a href="<?= base_url("documents/quicklook") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Quick Look</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>&nbsp;&nbsp; Profile<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--                                <li><a href="#">Change Password</a></li>
                                                                <li role="separator" class="divider"></li>-->
                                <li><a href="<?= base_url("documents/logout") ?>">Logout</a></li>
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
                    <span class="page-title">Approve/Disapprove Documents</span>
                    <br/>
                    <p class="sub-title-page">
                        This page will display the list of vendors waiting for approval.
                    </p>
                </div>
                <br/>
                <p class="sub-title-page" style="color:blue">
                    <?php
                    if ($this->session->flashdata("message") !== NULL) {
                        echo $this->session->flashdata("message");
                    }
                    ?>
                </p>
                <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <?php  if($type === "cancel_status") {
                                    ?> 
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Branch Name</th>
                                <th>IFSC</th>
                                        <?php
                                }?>
                                <th>Document</th>
                                <th>Options</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 0;
                            if ($vendors !== NULL) {
                                foreach ($vendors as $value) {
                                    $info = "Company: ".$value->company."<br/>Name: ".$value->first_name." ".$value->last_name."<br/>Email: ".$value->email."<br/>". (isset($value->input) ? " ID : ".$value->input : "");
                                    
                                    ?> 
                                    <tr>
                                        <td><?= ++$index ?></td>
                                        <td><?= $value->company ?></td>
                                        <td><?= $value->first_name . " " . $value->last_name ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->phone ?></td>
                                        <td><?= date("d-m-Y", strtotime($value->enter_date)) ?></td>
                                        <?php  if($type === "cancel_status") {
                                            $info .= "<br/>Account Name: ".$value->account_name."<br/>Account Number: ".$value->account_number."<br/>Bank Name: ".$value->bank_name."<br/> Branch Name: ".$value->branch_name."<br/> IFSC: ".$value->ifsc;
                                    ?> 
                                        
                                        <td><?= $value->account_name?></td>
                                        <td><?= $value->account_number?></td>
                                        <td><?= $value->bank_name?></td>
                                        <td><?= $value->branch_name?></td>
                                        <td><?= $value->ifsc?></td>
                                        <?php
                                }?>
                                        <td><a href=""  data-toggle="modal" data-target="#myModal" onclick="getContent('<?= $info?>', '<?= $value->data ?>')">Click here</a></td>
                                        <td>
                                <center>
                                    <a class="btn btn-success" href="<?= base_url("proprietorstatus/change_status?type=" . $type . "&status=Approved&vendor_id=" . $value->id . "&url=" . $url) ?>">Approve</a>
                                    <a class="btn btn-danger" href="<?= base_url("proprietorstatus/change_status?type=" . $type . "&status=Rejected&vendor_id=" . $value->id . "&url=" . $url) ?>">Reject</a>
                                </center>
                                </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <br/>
                <br/>
                <?php if(isset($pending_vendors)) { ?>
                <div class="row">
                    <span class="page-title">Vendors Who dint fill their Bank Details</span>
                    <br/>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registration Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $index = 0;
                            if($pending_vendors != NULL) {
                                if(count($pending_vendors) > 0) {
                                    foreach($pending_vendors as $value) {
                            ?> 
                            <tr>
                                <td><?= ++$index?></td>
                                <td><?= $value->company?></td>
                                <td><?= $value->first_name?>&nbsp; <?= $value->last_name?></td>
                                <td><?= $value->email?></td> 
                                <td><?= $value->phone?></td>
                                <td><?=  date("d-m-Y", strtotime($value->enter_date))?></td>
                            </tr>

                            <?php
                                    } 
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
        </main>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Document</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <span id="input_id" style="font-weight: bold; font-size: 1em"></span>
                        </div>
                        <div class="row">
                            <div id="content">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>
        <script src="<?php echo base_url("js/assign_agent.js") ?>"></script>
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
                                                    "scrollX": true,
                                                    "sScrollX": "100%",
                                                    dom: 'Bfrtip',
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
    </body>
</html>