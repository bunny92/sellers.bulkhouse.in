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
        <script type="text/javascript">(function (d, n) {
            var s, a, p;
            s = document.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            s.src = (document.location.protocol === "https:" ? "https:" : "http:") + "//cdn.nudgespot.com" + "/nudgespot.js";
            a = document.getElementsByTagName("script");
            p = a[a.length - 1];
            p.parentNode.insertBefore(s, p.nextSibling);
            window.nudgespot = n;
            n.init = function (t) {
                function f(n, m) {
                    var a = m.split('.');
                    2 == a.length && (n = n[a[0]], m = a[1]);
                    n[m] = function () {
                        n.push([m].concat(Array.prototype.slice.call(arguments, 0)))
                    }
                }
                n._version = 0.1;
                n._globals = [t];
                n.people = n.people || [];
                n.params = n.params || [];
                m = "track register unregister identify set_config people.delete people.create people.update people.create_property people.tag people.remove_Tag".split(" ");
                for (var i = 0; i < m.length; i++)
                    f(n, m[i])
            }
        })(document, window.nudgespot || []);
        nudgespot.init("a3b2a04cb8a634716c8f7a599784a8c8");
 </script>
    </head>

    
     <script>
        var activity_name = "Seller_registered";
        nudgespot.track(activity_name);

        function nodgespot() {
            var email = document.getElementById("email").value;
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;

            nudgespot.identify(email, {first_name: first_name, last_name: last_name, user_type: 'Seller'});
          

        }
    </script>
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
        <input type="hidden" id="base_url" value="<?php echo base_url() ?>"/>
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
                                <a href="#" type="btn btn-danger" class="btn btn-danger btn-default btn-circle" disabled="disabled">1</a>
                                <p>Information</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#" type="button" class="btn btn-danger btn-circle">2</a>
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

                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>register/second_step" onsubmit="return validateForm()">
                        <input type="hidden" name="vendor_id" value="<?= $vendor_id ?>"/>
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Email-Id: <span style="color:red">&nbsp;</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="email" id="email" readonly="true" value="<?php echo $this->session->flashdata("email") ?>" class="form-control" name="email">
                                <label class="custom-error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Company Name: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="company" class="form-control" placeholder="Enter Your Company Name" required="true" name="company"/>
                                <label class="custom-error" id="company_error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Firm Type: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <select  class="form-control" name="firm" id="firms">
                                    <option value="no">--Select Firm Type--</option>
                                    <?php
                                    foreach ($firms as $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <label class="custom-error" id="firm_error"></label>
                            </div>
                        </div>
                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Name: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-3">
                                <input type="text" id="first_name" class="form-control" placeholder="Firstname" required="true" name="firstname"/>
                                <label class="custom-error" id="first_name_error"></label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="last_name" class="form-control" placeholder="Lastname" required="true" name="lastname"/>
                                <label class="custom-error" id="last_name_error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Create password: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="password" id="password" class="form-control" placeholder="Enter Password" required="true" name="password"/>
                                <label class="custom-error" id="password_error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Confirm Password: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" required="true"/>
                                <label class="custom-error" id="confirm_password_error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Pin code: <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="pincode" class="form-control" placeholder="Enter Pincode" required="true" name="pincode"/>
                                <label class="custom-error" id="pincode_error"></label>
                            </div>
                        </div>

                        <div class="form-group marginRow">
                            <label class="control-label col-sm-4">
                                Agent Id:
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="agent_id" class="form-control" placeholder="Enter Agent Id if any" name="agent_id"/>
                                <label class="custom_error" id="agent_id_error"></label>
                            </div>
                        </div>


                        <div class="form-group marginRow">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" onclick="nodgespot()" class="btn btn-danger">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <hr style="border-color:#d5d5d5"/>
            <div class="container">
                <div class="container-fluid" style="color:#9d9d9d;font-size: 12px;">
                    <center>
                        Address:LEVEL I, II, III THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA. EMAIL: SALES@BULKHOUSE.COM, PHONE NO: (+91) 891-3939393
                        <br/>
                        &copy;&nbsp;&nbsp;Copyrights Bulkhouse India Private Trading Ltd. All rights reserved
                    </center>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>js/account.js"></script>

    </body>
</html>