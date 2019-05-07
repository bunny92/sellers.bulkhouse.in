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
            .captcha {font-family: 'Arial, Helvetica, sans-serif', cursive;font-size:26px; letter-spacing: 4px;font-weight: bolder; color:red;padding:10px;}
            footer {color:#777;}
            .control-label{font-weight: 400;}
            .terms{font-weight: 400;font-size: 12px;}
            .terms p{font-weight: 400;font-size:10px;}
            .marginRow{margin-bottom: 2px;}
        </style>
        <script type="text/javascript">(function(d,n){var s,a,p;s=document.createElement("script");s.type="text/javascript";s.async=true;s.src=(document.location.protocol==="https:"?"https:":"http:")+"//cdn.nudgespot.com"+"/nudgespot.js";a=document.getElementsByTagName("script");p=a[a.length-1];p.parentNode.insertBefore(s,p.nextSibling);window.nudgespot=n;n.init=function(t){function f(n,m){var a=m.split('.');2==a.length&&(n=n[a[0]],m=a[1]);n[m]=function(){n.push([m].concat(Array.prototype.slice.call(arguments,0)))}}n._version=0.1;n._globals=[t];n.people=n.people||[];n.params=n.params||[];m="track register unregister identify set_config people.delete people.create people.update people.create_property people.tag people.remove_Tag".split(" ");for(var i=0;i<m.length;i++)f(n,m[i])}})(document,window.nudgespot||[]);nudgespot.init("a3b2a04cb8a634716c8f7a599784a8c8");</script>
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
                                <a href="#" type="btn btn-danger" class="btn btn-danger btn-circle">1</a>
                                <p>Information</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
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
                <div class="col-md-6 col-md-offset-3">

                    <form class="form-horizontal" method="post" action="<?php echo base_url()?>register/first_step" onsubmit="return validateForm()">
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Your Email-Id:
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email-id" required="true"/>
                                <label class="custom-error" id="email_error"></label>
                            </div>
                        </div>
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Your Phone Number:
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" required="true"/>
                                <label class="custom-error" id="phone_error"></label>
                            </div>
                        </div>
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Choose Your Sales Market:
                            </label>
                            <div class="col-sm-5">
                                <select class="form-control" id="transaction" name="transaction">
                                    <option value="no">--Select Market--</option>
                                    <option value="Domestic">Domestic</option>

                                    <option value="Export">Export Through Bulkhouse</option>

                                    <option value="Both">Both</option>
                                </select>
                                <label class="custom-error" id="transaction_error"></label>
                            </div>
                        </div>
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">Verification:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" required="true" placeholder="Verification Code" id="verification" style="background-color: #d5d5d5;color:firebrick">
                                <label class="custom-error" id="verification_error"></label>
                            </div>
                            <div class="col-sm-4">
                                <label style="background-image: url(images/pattern.jpg)" class="control-label captcha" id="captchaValue"></label> &nbsp; <button class="btn btn-danger" type="button" onclick="reloadCaptcha()"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <label class="terms"><input type="checkbox" id="terms_check" onclick="checkFunction()" checked="true" style="background-color: firebrick" id="terms">&nbsp;&nbsp;By clicking next,you agree to:<br/><br/>
                                    <p class="col-sm-offset-1">- The <a href="http://bulkhouse.in" style="color:firebrick">Bulkhouse Trading India Private Ltd.</a> <a href="#" onclick="getTerms()">Terms and Conditions</a><br/>
                                        - Receive emails from <a href="https://bulkhouse.in" style="color:firebrick">Bulkhouse.in</a> related to membership and services</p>

                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" id="next" class="btn btn-danger">Next Step</button>
                            </div>
                        </div>
                    </form>
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
                        &copy;&nbsp;&nbsp;Copyrights Bulkhouse Trading  India Private Ltd. All rights reserved
                    </center>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script src="js/information.js"></script>
        <script type="text/javascript">
                                    $(document).ready(function () {
                                        $.get("<?php echo base_url() ?>register/getCaptcha", {}, function (data) {
                                            $("#captchaValue").html(data);
                                        });


                                    });

                                    function checkFunction() {
                                        if(!document.getElementById("terms_check").checked) {
                                            $("#next").addClass('disabled');

                                        } else {
                                            $("#next").removeClass('disabled')
                                        }
                                    }

                                    function reloadCaptcha() {
                                        $.get("<?php echo base_url() ?>register/getCaptcha", {}, function (data) {
                                            $("#captchaValue").html(data);
                                        });
                                    }

                                    function getTerms() {
                                      var val = $("#transaction").val();
                                      if(val === "no") {
                                        alert("Please select Sales Market");
                                      } else {
                                        if(val === "Export") {
                                          window.open("<?php echo base_url("register/export")?>");
                                        } else if(val === "Domestic") {
                                          window.open("<?php echo base_url("register/domestic")?>");
                                        } else if(val === "Both") {
                                          window.open("<?php echo base_url("register/both")?>");

                                        }
                                      }
                                    }

        </script>
    </body>
</html>
