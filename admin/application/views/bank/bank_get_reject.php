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
                        <li><a href="<?= base_url("bank") ?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Bank Report </a></li>
                        <li><a href="<?= base_url("bank/deposit") ?>"><span class="fa fa-bank"></span>&nbsp;&nbsp;Bank Verifier</a></li>
                        <li><a href="<?= base_url("bank/get_deposit") ?>"><span class="fa fa-bank"></span>&nbsp;&nbsp;Bank Deposit</a></li>
                        <li><a href="<?= base_url("bank/get_approved") ?>"><span class="fa fa-bank"></span>&nbsp;&nbsp;Bank Approved</a></li>
                        <li class="active"><a href="<?= base_url("bank/get_rejected") ?>"><span class="fa fa-bank"></span>&nbsp;&nbsp;Bank Rejected</a></li>
                        <li><a href="<?= base_url("bank/get_pending") ?>"><span class="fa fa-bank"></span>&nbsp;&nbsp;Bank Pending</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-cogs"></span>&nbsp;&nbsp; Profile<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--                                <li><a href="#">Change Password</a></li>
                                                                <li role="separator" class="divider"></li>-->
                                <li><a href="<?= base_url("bank/logout") ?>">Logout</a></li>
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
                    <span class="page-title">Accounts Rejected Report</span>
                    <br/>
                    <p class="sub-title-page">
                        This page will display the list of vendors whose accounts are rejected
                    </p>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
                    <center>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-sm-1">S.No</th>
                                        <th>Company</th>
                                        <th>Email ID</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Bank Name</th>
                                        <th>Branch Name</th>
                                        <th>IFSC</th>
                                        <th>Amount</th>
                                        <th>Attempts</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index = 0;
                                    if ($list !== NULL) {
                                        foreach ($list as $value) {
                                            ?> 
                                            <tr>
                                                <td><?= ++$index ?></td>
                                                <td><?= $value->company ?></td>
                                                <td><?= $value->email ?></td>
                                                <td><?= $value->account_name ?></td>
                                                <td><?= $value->account_number ?></td>
                                                <td><?= $value->bank_name ?></td>
                                                <td><?= $value->branch_name ?></td>
                                                <td><?= $value->ifsc ?></td>
                                                <td><?= $value->amount ?></td>
                                                <td><?= $value->click_count ?></td>
                                                <td><?= $value->bank_status ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }

                                  
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </main>
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