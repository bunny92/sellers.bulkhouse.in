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
        <link href="<?php echo base_url() ?>css/login.css" rel="stylesheet" type="text/css">
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
                        <li><a href="tel:(+91)891-3939393"> <span class="glyphicon glyphicon-earphone"></span>&nbsp; &nbsp;(+91)891-3939393</a></li>
                        <li><a href="mailto:vsupport@bulkhouse.in"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;vsupport@bulkhouse.in</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?php echo base_url() ?>welcome/login">Login</a></li>
                        <li><a href="<?php  echo base_url()?>register">Register</a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
        <br/>
        <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall" style="background-color:white;border-top: 1px solid #eee;">
                <center>
                    <img  class="img-responsive"  style="width:70%" src="<?php echo base_url() ?>images/icon.png" alt="">
                </center>

                <p class="profile-name">Bulkhouse Seller Account</p>
                <br/>
                <form class="form-signin" style="background-color:white" action="<?php echo base_url()?>welcome/authenticate_user" method="post" onsubmit="return validateCred()">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="<?php if(isset($email)){echo $email;} ?>" required>
                    <input type="password" id="pwd" name="password" class="form-control" placeholder="Password" required >
                <button class="btn btn-lg btn-danger btn-block" type="submit">
                    Sign in</button>
                    <span class="custom-error" id="error"><?php if(isset($response)) {echo $response;} ?></span>
                <a href="<?php echo base_url(); ?>welcome/forgot_password" class="need-help">Forgot Password? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo base_url() ?>register" class="text-center new-account">Create Seller Account</a>
        </div>
    </div>
</div>
        <br/>
        <br/>
        <br/>


        <div class="row">
            <hr style="border-color:#d5d5d5;margin-left: 10px; margin-right: 10px; padding: 10px;"/>
            <div class="container">
                <div class="container-fluid" style="color:#9d9d9d;font-size: 12px;">
                    <center>
                        Address:LEVEL II, THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA. EMAIL: SALES@BULKHOUSE.COM, PHONE NO: (+91) 891-3939393
                        <br/>
                        &copy;&nbsp;&nbsp;Copyrights Bulkhouse Trading India Private Ltd. All rights reserved
                    </center>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script>
            function validateCred() {
                $("#error").html("");
                var email = $("#email").val();
                var pwd = $("#pwd").val();
                var email_regex  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var flag = true;
                if(!email_regex.test(email)) {
                    flag = false;
                    $("#error").html("Email is not valid");
                }
                else if(pwd.trim().length === 0) {
                    flag = false;
                    $("#error").html("Password cannot be empty");
                }

                return flag;

            }
            </script>
    </body>
</html>
