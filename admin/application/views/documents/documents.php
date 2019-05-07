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
                    <span class="page-title">Documents To Be Approved</span>
                    <br/>
                    <p class="sub-title-page">
                        This page displays the list of documents to be approved
                    </p>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Proprietorship Documents' Status</div>
                            <div class="panel-body">
                                <?php 
                                
                                    $photo = 0;
                                    $vat = 0;
                                    $pan = 0;
                                    $cenvat = 0;
                                    $cancel = 0;
                                     if($prop !== NULL) {
                                        $photo = $prop->total_photo != NULL ? $prop->total_photo : 0;
                                        $vat = $prop->total_vat != NULL ? $prop->total_vat : 0;
                                        $pan = $prop->total_pan != NULL ? $prop->total_pan : 0;
                                        $cenvat = $prop->total_cenvat != NULL ? $prop->total_cenvat : 0;
                                        $cancel = $prop->total_cancel != NULL ? $prop->total_cancel : 0;
                                    }
                                ?>
                                <table class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Pending (count)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td><td>Photo ID</td><td><a href="<?= base_url("proprietorstatus/photo")?>" class="btn btn-default"><?= $photo?></a></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td><td>VAT/CST</td><td><a href="<?= base_url("proprietorstatus/vat")?>"  class="btn btn-default"><?= $vat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td><td>PAN</td><td><a href="<?= base_url("proprietorstatus/pan")?>"  class="btn btn-default"><?= $pan?></a></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td><td>CENVAT</td><td><a href="<?= base_url("proprietorstatus/cenvat")?>"  class="btn btn-default"><?= $cenvat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td><td>CHEQUE</td><td><a href="<?= base_url("proprietorstatus/cancel")?>"  class="btn btn-default"><?= $cancel?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                        <div class="col-md-4 col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Partnership Documents' Status</div>
                            <div class="panel-body">
                                <?php 
                                    $photo = 0;
                                    $vat = 0;
                                    $pan = 0;
                                    $cenvat = 0;
                                    $cancel = 0;
                                    $deed = 0;
                                    if($partner !== NULL) {
                                        $photo = $partner->total_photo != NULL ? $partner->total_photo : 0;
                                        $vat = $partner->total_vat != NULL ? $partner->total_vat : 0;
                                        $pan = $partner->total_pan != NULL ? $partner->total_pan : 0;
                                        $cenvat = $partner->total_cenvat != NULL ? $partner->total_cenvat : 0;
                                        $cancel = $partner->total_cancel != NULL ? $partner->total_cancel : 0;
                                        $deed = $partner->total_deed != NULL ? $partner->total_deed : 0;
                                    }
                                ?>
                                <table class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Pending (count)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td><td>Photo ID</td><td><a href="<?= base_url("partnerstatus/photo")?>"   class="btn btn-default"><?= $photo?></a></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td><td>VAT/CST</td><td><a href="<?= base_url("partnerstatus/vat")?>"  class="btn btn-default"><?= $vat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td><td>PAN</td><td><a href="<?= base_url("partnerstatus/pan")?>"  class="btn btn-default"><?= $pan?></a></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td><td>CENVAT</td><td><a href="<?= base_url("partnerstatus/cenvat")?>"  class="btn btn-default"><?= $cenvat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td><td>Partnership DEED</td><td><a href="<?= base_url("partnerstatus/deed")?>"  class="btn btn-default"><?= $deed?></a></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td><td>CHEQUE</td><td><a href="<?= base_url("partnerstatus/cancel")?>"  class="btn btn-default"><?= $cancel?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Private Limited Documents' Status</div>
                            <div class="panel-body">
                                <?php 
                                    $photo = 0;
                                    $vat = 0;
                                    $pan = 0;
                                    $cenvat = 0;
                                    $cancel = 0;
                                    $moa = 0;
                                    if($private !== NULL) {
                                        $photo = $private->total_photo != NULL ? $private->total_photo : 0;
                                        $vat = $private->total_vat != NULL ? $private->total_vat : 0;
                                        $pan = $private->total_pan != NULL ? $private->total_pan : 0;
                                        $cenvat = $private->total_cenvat != NULL ? $private->total_cenvat : 0;
                                        $cancel = $private->total_cancel != NULL ? $private->total_cancel : 0;
                                        $moa = $private->total_moa!= NULL ? $private->total_moa : 0;
                                    }
                                ?>
                                <table class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Pending (count)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td><td>Photo ID</td><td><a href="<?= base_url("privatestatus/photo")?>"   class="btn btn-default"><?= $photo?></a></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td><td>VAT/CST</td><td><a href="<?= base_url("privatestatus/vat")?>"   class="btn btn-default"><?= $vat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td><td>PAN</td><td><a href="<?= base_url("privatestatus/pan")?>"    class="btn btn-default"><?= $pan?></a></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td><td>CENVAT</td><td><a href="<?= base_url("privatestatus/cenvat")?>"    class="btn btn-default"><?= $cenvat?></a></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td><td>MOA</td><td><a href="<?= base_url("privatestatus/moa")?>"    class="btn btn-default"><?= $moa?></a></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td><td>CHEQUE</td><td><a href="<?= base_url("privatestatus/cancel")?>"    class="btn btn-default"><?= $cancel?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    
                </div>
            </div>
        </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url("js/bootstrap.min.js") ?>"></script>
<!--    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
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
            "sScrollX" : "100%",
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength','copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>-->
    </body>
</html>