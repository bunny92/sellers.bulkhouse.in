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
                        <li class="active"><a href="<?= base_url("api") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;Magento Sync</a></li>
                        <li><a href="<?= base_url("api/search_magent") ?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Search Email[Magento Sync]</a></li>
                        <li><a href="<?= base_url("api/crm") ?>"><span class="fa fa-desktop"></span>&nbsp;&nbsp;CRM Sync</a></li>
                        <li><a href="<?= base_url("api/search_crm") ?>"><span class="fa fa-users"></span>&nbsp;&nbsp;Search Email[CRM Sync]</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url("api/logout") ?>">Logout</a></li>

                    </ul> 
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <main>
            <div class="container">
                <br/>
                <div class="row">
                    <span class="page-title">Magento Vendors</span>
                    <br/>
                    <p class="sub-title-page">
                        This page gives you all set of vendors who are waiting to get synchronized with Magento
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
                                    <th>Email ID</th>
                                    <th>Synchronize</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($magento !== NULL) {
                                    $index = 0;
                                    foreach ($magento as $value) {
                                        
                                        ?>
                                        <tr>
                                            <td id="<?= ++$index ?>"><?= ++$index ?></td>
                                            <td><?= $value->email ?></td>
                                            <td><a href="#" onclick="sync_maze('<?= $value->email?>')" class="btn btn-default"><span class="fa fa-external-link"></span></a></td>

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
            
            function sync_maze(email) {
                $.post("<?=base_url("api/sync_maze")?>", {email : email}, function(data) {
                    alert(data);
                    
                });
            }
        </script>
    </body>
</html>