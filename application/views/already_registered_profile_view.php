<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bulkhouse Seller Portal</title>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/wizard.css">
        <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url() ?>css/navbar.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
        <style type="text/css">
            .navbar{background-color:white;}
            .custom-error{font-size:11px;color:red;padding-left:4px}
            .captcha {font-family: 'Shadows Into Light', cursive;font-size:22px; letter-spacing: 4px;font-weight: bolder; color:red;padding:10px;}
            footer {color:#777;}
            .control-label{font-weight: 400;}
            .terms{font-weight: 400;font-size: 12px;}
            .terms p{font-weight: 400;font-size:10px;}
            .marginRow{margin-bottom: 2px;}
        </style>
    </head>

    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive  hidden-xs" style="width:90%">
                        <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive hidden-sm hidden-md hidden-lg" style="width:85%; margin-top: -10px;">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Bulkhouse.in</a></li>
                        <li><a href="tel:(+91)891-3939393"> <span class="glyphicon glyphicon-earphone"></span>&nbsp; &nbsp;(+91) 891-3939393</a></li>
                        <li><a href="mailto:vsupport@bulkhouse.in"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;vsupport@bulkhouse.in</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="<?php echo base_url() ?>welcome/login">Login</a></li>
                        <li class="active"><a href="<?php echo base_url() ?>register">Register</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>

        <!-- Base URL -->
        <input type="hidden" id="base_url" value="<?php echo base_url()?>"/>
        <div class="container ">
            <div class="container-fluid">
                <center>
                    <span class="center-block" style="font-size:14px;color:#616161;"><span class="highlight">Bulkhouse</span> Seller Account Creation</span>
                </center>
            </div>
        </div>
        <br/>
        <br/>
        <div class="container">
            <div class="container-fluid">
                <div class="col-md-8 col-md-offset-2">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#" type="btn btn-danger" class="btn btn-danger btn-circle" disabled="disabled">1</a>
                                <p>Information</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#" type="button" class="btn btn-danger btn-circle" >2</a>
                                <p>Profile</p>
                            </div>

                            <div class="stepwizard-step">
                                <a href="#" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Complete</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="container-fluid">
            <div class="row vertical-center-row">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <br/>
                    <center>
                    <b style="color:red">You have successfully completed the registration process. Kindly Login to access your account.</b>
                    </center>
                    <br/>
                    <br/>
                </div>
                </div>

                <br/>
                <br/><br/><br/><br/>
                <div class="row" style="font-size:11px;">
                <div class="col-md-6 col-md-offset-3">
                    <b>Problems Signing In</b>

                    <ul>
                        <li>
                            Forgot Password? .. Please <a href="#">Click Here</a>
                        </li>
                        <li>
                          For Further assistance kindly email us to our email : vsupport@bulkhouse.in
                        </li>
                    </ul>

                </div>
                </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <hr style="border-color:#d5d5d5"/>
            <div class="container">
                <div class="container-fluid" style="color:#9d9d9d;font-size: 12px;">
                    <center>
                        Address:LEVEL II, THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA. EMAIL: SALES@BULKHOUSE.COM, PHONE NO: (+91) 891-3939393
                        <br/>
                        &copy;&nbsp;&nbsp;Copyrights Bulkhouse India Private Trading Ltd. All rights reserved
                    </center>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

    </body>
</html>
